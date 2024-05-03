<?php
class CurrentCommande
{
    private array $listeBoissons;
    public $objetBoissons;

    public function __construct($objetBoissons)
    {
        $this->objetBoissons = $objetBoissons;
    }

    public function GetListeBoissons()
    {
        return $this->listeBoissons;
    }

    public function AddToListe($boisson)
    {
        $this->listeBoissons[] = $boisson;
    }
}
