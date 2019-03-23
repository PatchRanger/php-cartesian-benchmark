<?php

namespace Benchcart;

use Spork\ProcessManager;
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

		$manager = new ProcessManager();
		/** @var Result[] $results */
		$results = [];
		foreach ($this->tasks as $task) {
			if (!$task->isValid()) {
				continue;
			}

			$fork = $manager
				->fork(function() use ($task, $iterators) {
					echo sprintf('[%s] start.', $task->getName());
					$stopwatch = new Stopwatch();
					$stopwatch->start('iterating');
					$task->prepare();
					$stopwatch->lap('iterating');
					$e = null;
					try {
						$task->run($iterators);
					} finally {
						$event = $stopwatch->stop('iterating');
						echo sprintf('[%s] finished.', $task->getName());
						return $event;
					}
				});

			while (!$fork->isExited() && !$fork->isStopped() && !$fork->isSignaled()) {
				$fork->wait(false);
				sleep(0.1);
			}

			$output = $fork->getOutput();
			if ($output) {
				echo $output . "\n";
			}
			$event = $fork->getResult();
			$error = $fork->getError();
			$results[] = new Result($task->getName(), $event, $error);
		}

		return $results;
	}

	/**
	 * This does not work as it populates with the same iterator and \MultipleIterator attaches only one of them.
	 * ```
	 * return array_fill(0, $count, new \ArrayIterator(range(1, $by)));
	 * ```
	 * @return \Iterator[]
	 */
	private function prepareIterators(int $count, int $by): array
	{
		$arrayIterator = new \ArrayIterator(range(1, $by));
		return array_map(function () use ($arrayIterator) { return clone $arrayIterator; }, range(1, $count));
	}
}
