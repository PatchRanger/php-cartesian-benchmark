<?php

namespace Benchcart;

use Symfony\Component\Stopwatch\StopwatchEvent;

class Result
{
	private $name;
	private $event;
	private $exception;

	public function __construct($name, ?StopwatchEvent $event = null, $e = null)
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
		return $this->event ? $this->event->getDuration() : null;
	}

	public function getMemory()
	{
		return $this->event ? $this->event->getMemory() : null;
	}

	public function getException()
    {
        return $this->exception;
    }
}
