<?php
class Table
{
    private $name;
    private $isTaken;
    private $order;

    public function __construct($name)
    {
        $this->name = $name;
        $this->isTaken = false;
        $this->order = null;
    }

    public function getName()
    {
        return $this->name;
    }
}
