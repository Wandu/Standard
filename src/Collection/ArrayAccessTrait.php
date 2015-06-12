<?php
namespace Wandu\Standard\Collection;

trait ArrayAccessTrait
{
    /** @var array */
    protected $items = [];

    /**
     * @param string $name
     * @return mixed|null
     */
    public function offsetGet($name)
    {
        return isset($this->items[$name]) ? $this->items[$name] : null;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function offsetSet($name, $value)
    {
        $this->items[$name] = $value;
    }

    /**
     * @param string $name
     */
    public function offsetUnset($name)
    {
        unset($this->items[$name]);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function offsetExists($name)
    {
        return isset($this->items[$name]);
    }
}
