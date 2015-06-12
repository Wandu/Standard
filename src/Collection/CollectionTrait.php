<?php
namespace Wandu\Standard\Collection;

/**
 * implements ArrayAccess, Iterator, Arrayable, Jsonable, Countable
 */
trait CollectionTrait
{
    use IteratorTrait;

    /**
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->items;
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * @param mixed $item
     */
    public function push($item)
    {
        array_push($this->items, $item);
    }

    /**
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->items);
    }

    /**
     * @param mixed $item
     */
    public function unshift($item)
    {
        array_unshift($this->items, $item);
    }

    /**
     * @return mixed
     */
    public function shift()
    {
        return array_shift($this->items);
    }
}
