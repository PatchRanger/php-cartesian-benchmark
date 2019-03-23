<?php

namespace Benchcart\Task;

use Benchcart\TaskInterface;
use PatchRanger\CartesianIterator;

/**
 * Benchmark for patchranger/cartesian-iterator
 */
class PatchrangerCartesianIteratorTask implements TaskInterface
{
    /** @var CartesianIterator */
    protected $iterator;

    public function getName()
    {
        return 'patchranger/cartesian-iterator';
    }

    public function prepare()
    {
        $this->iterator = new CartesianIterator();
    }

    public function run(array $iterators)
    {
        foreach ($iterators as $key => $iterator) {
            $this->iterator->attachIterator($iterator, $key);
        }
        iterator_to_array($this->iterator);
    }

    public function isValid()
    {
        return version_compare(PHP_VERSION, '7.1.0') === 1;
    }

}
