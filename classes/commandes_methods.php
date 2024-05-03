<?php

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

    private function AddCommande()
    {
        foreach ($this->commandes as $commande) {
        }

        foreach ($this->objetBoissons->boissons as $boisson) {
            if (isset($_POST["boissons-selected" . $boisson->getID()])) {
                $boissonSelected['boissons-selected' . $boisson->getID()] = $boisson->getName();
            }
        }

        if (isset($_POST['commande-create'])) {
        }
    }

    private function FormProcess()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->AddCommande();
        }
    }

    private function SaveCommandes()
    {
        $dataBrut = [];
        foreach ($this->commandes as $commande) {
            $dataBrut[] = [
                'listeBoisson' => $commande->getListeBoisson(),
                'prix' => $commande->getPrix(),
                'date' => $commande->getDate(),
                'paiment' => $commande->getPaiment(),
            ];
        }

        setcookie("commandes", json_encode($dataBrut), strtotime("+1 year"));
    }
}
