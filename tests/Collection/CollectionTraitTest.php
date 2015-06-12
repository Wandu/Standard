<?php
namespace Wandu\Standard\Collection;

use ArrayAccess;
use Iterator;
use Countable;
use PHPUnit_Framework_TestCase;
use Mockery;

class CollectionTraitTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testConstruct()
    {
        $this->assertEquals(new CollectionImpl(), new CollectionImpl([]));
    }

    public function testCount()
    {
        $this->assertEquals(2, count(new CollectionImpl([1,2])));
    }

    public function testIterate()
    {
        $collection = new CollectionImpl(['aaa', 'bbb', 'ccc']);

        foreach ($collection as $key => $item)
        {
            switch ($key) {
                case 0:
                    $this->assertEquals('aaa', $item);
                    break;
                case 1:
                    $this->assertEquals('bbb', $item);
                    break;
                case 2:
                    $this->assertEquals('ccc', $item);
                    break;
            }
        }
    }

    public function testToArray()
    {
        $collection = new CollectionImpl(['aaa', 'bbb', 'ccc']);
        $this->assertEquals(['aaa', 'bbb', 'ccc'], $collection->toArray());
        $this->assertEquals('["aaa","bbb","ccc"]', $collection->toJson());
    }

    public function testStack()
    {
        $collection = new CollectionImpl();

        $collection->push('hello?');

        $this->assertEquals('hello?', $collection->pop());
    }

    public function testStackByShift()
    {
        $collection = new CollectionImpl();

        $collection->unshift('hello?');

        $this->assertEquals('hello?', $collection->shift());
    }
}

class CollectionImpl implements ArrayAccess, Iterator, Arrayable, Jsonable, Countable
{
    use CollectionTrait;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }
}
