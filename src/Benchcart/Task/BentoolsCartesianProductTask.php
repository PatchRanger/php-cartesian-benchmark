<?php

namespace Benchcart\Task;

use Benchcart\TaskInterface;
use function BenTools\CartesianProduct\cartesian_product;

/**
 * Benchmark for bentools/cartesian-product
 */
class BentoolsCartesianProductTask implements TaskInterface
{
    public function getName()
    {
        return 'bentools/cartesian-product';
    }

    public function prepare()
    {
    }

    public function run(array $iterators)
    {
        $data = [];
        foreach ($iterators as $key => $iterator) {
            $data[$key] = iterator_to_array($iterator);
        }
        iterator_to_array(cartesian_product($data));
    }

    public function isValid()
    {
        return version_compare(PHP_VERSION, '5.6.0') === 1;
    }

}
