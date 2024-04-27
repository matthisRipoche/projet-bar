<?php
class Commande
{
    private int $id;
    private array $listeBoisson = [];
    private int $prix;
    private string $date;
    private bool $paiment;

    public function __construct($id, $data)
    {
        $this->id = $id;
        $this->listeBoisson = $data['listeBoisson'];
        $this->prix = $data['prix'];
        $this->date = $data['date'];
        $this->paiment = $data['paiment'];
    }

    //getters
    public function getID()
    {
        return $this->id;
    }

    public function getListeBoisson()
    {
        return $this->listeBoisson;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getPaiment()
    {
        return $this->paiment;
    }

    //setters
    public function setID($newID)
    {
        $this->id = $newID;
    }

    public function setListeBoisson($newListeBoisson)
    {
        $this->listeBoisson = $newListeBoisson;
    }

    public function setPrix($newPrix)
    {
        $this->prix = $newPrix;
    }

    public function setDate($newDate)
    {
        $this->date = $newDate;
    }

    public function setPaiment($newPaiment)
    {
        $this->paiment = $newPaiment;
    }
}
