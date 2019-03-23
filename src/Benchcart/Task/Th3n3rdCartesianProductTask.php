<?php

namespace Benchcart\Task;

use Benchcart\TaskInterface;
use Nerd\CartesianProduct\CartesianProduct;

/**
 * Benchmark for th3n3rd/cartesian-product
 */
class Th3n3rdCartesianProductTask implements TaskInterface
{
    /** @var CartesianProduct */
    private $cartesianProduct;

    public function getName()
    {
        return 'th3n3rd/cartesian-product';
    }

    public function prepare()
    {
        $this->cartesianProduct = new CartesianProduct();
    }

    public function run(array $iterators)
    {
        foreach ($iterators as $key => $iterator) {
            $this->cartesianProduct->appendSet(iterator_to_array($iterator));
        }
        iterator_to_array($this->cartesianProduct);
    }

    public function isValid()
    {
        return version_compare(PHP_VERSION, '5.3.3') === 1;
    }

}
