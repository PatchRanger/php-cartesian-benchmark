<?php

namespace Benchcart;

interface TaskInterface
{
	public function getName();
	public function prepare();
	public function run(array $iterators);
    public function isValid();
}
