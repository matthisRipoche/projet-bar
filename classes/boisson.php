<?php
class Boisson
{
    private $id;
    private $name;
    private $description;
    private $prix;

    public function __construct($id, $data)
    {
        $this->id = $id;
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->prix = $data['prix'];
    }

    //getters
    public function getID()
    {
        return $this->id;
    }

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
    public function setID($newID)
    {
        $this->id = $newID;
    }

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
