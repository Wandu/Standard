<?php
namespace Wandu\Standard\Collection;

use Iterator;
use PHPUnit_Framework_TestCase;

class IteratorTraitTest extends PHPUnit_Framework_TestCase
{
    public function testIterate()
    {
        $iterator = new IteratorImpl([1,2,3,4]);

        $items = [];
        foreach ($iterator as $item) {
            $items[] = $item;
        }

        $this->assertEquals(4, count($items));
        $this->assertEquals([1,2,3,4], $items);
    }
}

class IteratorImpl implements Iterator
{
    use IteratorTrait;

    public function __construct($items)
    {
        $this->items = $items;
    }
}
