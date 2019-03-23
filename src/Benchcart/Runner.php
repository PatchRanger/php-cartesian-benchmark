<?php

namespace Benchcart;

use Jenner\SimpleFork\Process;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Stopwatch\Stopwatch;

class Runner
{
	/** @var TaskInterface[] */
	private $tasks = [];

	public function __construct()
	{
		$finder = Finder::create()->in(__DIR__ . '/Task')->files()->name('*Task.php');

		foreach ($finder as $file) {
			/** @var \Symfony\Component\Finder\SplFileInfo $file */
			$fqcn = 'Benchcart\\Task\\' . str_replace('.php', '', $file->getRelativePathname());
			/** @var TaskInterface $runner */
			$runner = new $fqcn();

			$this->tasks[$runner->getName()] = $runner;
		}
	}

	public function run(int $count, int $by)
	{
		$iterators = $this->prepareIterators($count, $by);

		$pool = new SinglePool();

		/** @var Result[] $results */
		$results = [];
		foreach ($this->tasks as $task) {
			if (!$task->isValid()) {
				continue;
			}

			$workerFn = function () use ($task, $iterators, &$results) {
				$stopwatch = new Stopwatch();
				$stopwatch->start('iterating');
				$task->prepare();
				$stopwatch->lap('iterating');
				$e = null;
				try {
					$task->run($iterators);
				} catch (\Throwable $e) {
					// Handled by finally.
				} finally {
					$event = $stopwatch->stop('iterating');
					$results[] = new Result($task->getName(), $event, $e);
				}
			};

			$pool->execute(new Process($workerFn));
		}
		$pool->wait();
		return $results;
	}

	/**
	 * @return \Iterator[]
	 */
	private function prepareIterators(int $count, int $by): array
	{
		return array_fill(0, $count, new \ArrayIterator(range(1, $by)));
	}
}
