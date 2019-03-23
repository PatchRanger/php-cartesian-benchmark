<?php

namespace Benchcart;

use Symfony\Component\Stopwatch\StopwatchEvent;

class Result
{
	private $name;
	private $event;
	private $exception;

	public function __construct($name, StopwatchEvent $event, ?\Throwable $e = null)
	{
		$this->name = $name;
		$this->event = $event;
		$this->exception = $e;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getDuration()
	{
		return $this->event->getDuration();
	}

	public function getMemory()
	{
		return $this->event->getMemory();
	}

	public function getException(): ?\Throwable
    {
        return $this->exception;
    }
}
