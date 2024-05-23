<?php
class Commande
{
    private $id;
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

class Commandes_methods
{
    public array $commandes = [];
    private $objetBoissons;

    public function __construct($objetBoissons)
    {
        $this->objetBoissons = $objetBoissons;
        $this->InitCommandes();
        $this->FormProcess();
        $this->SaveCommandes();
    }

    private function FormProcess()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->AddCommande();
        }
    }

    private function AddCommande()
    {
        //fonction d add de commandes
    }

    private function InitCommandes()
    {
        if (isset($_COOKIE['commandes'])) {
            $dataBrut = json_decode($_COOKIE['commandes'], true);

            foreach ($dataBrut as $index => $data) {
                $newCommande = new Commande($index, $data);

                $this->commandes[] = $newCommande;
            }
        }
    }

    private function SaveCommandes()
    {
        $dataBrut = [];
        foreach ($this->commandes as $commande) {
            $dataBrut[] = [
                'ID' => $commande->getID(),
                'listeBoisson' => $commande->getListeBoisson(),
                'prix' => $commande->getPrix(),
                'date' => $commande->getDate(),
                'paiment' => $commande->getPaiment(),
            ];
        }
        setcookie("commandes", json_encode($dataBrut), strtotime("+1 year"));
    }
}
