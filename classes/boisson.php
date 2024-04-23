<?php
class Boisson
{
    private $name;
    private $description;
    private $prix;

    public function __construct($name, $description, $prix)
    {
        $this->name = $name;
        $this->description = $description;
        $this->prix = $prix;
    }

    //getters
    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    //setters
    public function setName($newName)
    {
        $this->name = $newName;
    }

    public function setDescription($newDescription)
    {
        $this->description = $newDescription;
    }

    public function setPrix($newPrix)
    {
        $this->prix = $newPrix;
    }
}
