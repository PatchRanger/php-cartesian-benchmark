<?php
namespace Benchcart;

use Jenner\SimpleFork\Process;

class SinglePool extends \Jenner\SimpleFork\SinglePool
{
	public function execute(Process $process)
	{
		//Utils::checkOverwriteRunMethod(get_class($process));

		if ($this->aliveCount() < $this->max && !$process->isStarted()) {
			$process->start();
		}
		array_push($this->processes, $process);
	}
}
