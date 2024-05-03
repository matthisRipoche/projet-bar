<?php

class Commandes_methods
{
    public array $commandes = [];
    private $objetBoissons;
    private $current;

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
        }
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
