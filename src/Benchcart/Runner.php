<?php

namespace Benchcart;

use Jenner\SimpleFork\Process;
use Spork\Fork;
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

		//$pool = new SinglePool();

		$manager = new ProcessManager();
		/** @var Result[] $results */
		$results = [];
		foreach ($this->tasks as $task) {
			if (!$task->isValid()) {
				continue;
			}

			/*$workerFn = function () use ($task, $iterators, &$results) {
				echo sprintf('[%s] start. Results: %d', $task->getName(), count($results));
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

			$pool->execute(new Process($workerFn));*/
			$results[] = $manager
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
				})
				->always(function(Fork $fork) use ($task) {
					$error = $fork->getError();
					$event = $fork->getResult();
					return new Result($task->getName(), $event, $error);
				});
		}
		//$pool->wait(true);

		/*$tasksIterator = new \ArrayIterator($this->tasks);
		$manager = new ProcessManager();
		return $manager
			->process($tasksIterator, function (TaskInterface $task) use ($iterators) {
				echo sprintf('[%s] start.', $task->getName());
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
					return new Result($task->getName(), $event, $e);
				}
			})
			->always(function (Fork $fork) {
				$error = $fork->getError();
				return $fork->getResult();
			});*/
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
