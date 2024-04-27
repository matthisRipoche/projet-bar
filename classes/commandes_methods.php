<?php
include_once('classes/commande.php');

class Commands_methods
{
    public array $commandes = [];

    public function __construct()
    {
        $this->InitCommandes();

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
