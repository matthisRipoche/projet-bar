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
        $this->listeBoisson = $data['listeBoisson'] ?? [];
        $this->prix = $data['prix'] ?? 0;
        $this->date = $data['date'] ?? date("d.m.y");
        $this->paiment = $data['paiment'] ?? false;
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
            $this->EditCommande();
            $this->SupprCommande();
        }
    }

    private function AddCommande()
    {
        if (isset($_POST['commande-create'])) {

            $commandeGen = [];
            $prixTotal = 0;

            $boissons = $this->objetBoissons->GetArrayBoissons();

            foreach ($boissons as $boisson) {
                if (isset($_POST['boissons-selected' . $boisson->getID()]) && !empty($_POST['boissons-selected' . $boisson->getID()])) {

                    $commandeGen[$boisson->getID()] = [
                        'name' => $boisson->getName(),
                        'prix' => $boisson->getPrix(),
                        'nombre' => $_POST['boissons-selected' . $boisson->getID()]
                    ];

                    $prixTotal += $boisson->getPrix() * $_POST['boissons-selected' . $boisson->getID()];
                }
            }

            $newCommande = new Commande(
                count($this->commandes),
                [
                    'listeBoisson' => $commandeGen,
                    'prix' => $prixTotal,
                    'date' => date("d.m.y"),
                    'paiment' => false,
                ]
            );

            $this->commandes[] = $newCommande;
        }
    }

    private function EditCommande()
    {
        if (isset($_POST["commande-edit"])) {
            foreach ($this->commandes as $commande) {
                if ($commande->getID() == $_POST['commande-sameID']) {
                }
            }
        }
    }

    private function SupprCommande()
    {
        if (isset($_POST["commande-supprID"])) {
            foreach ($this->commandes as $index => $commande) {
                if ($commande->getID() == $_POST['commande-supprID']) {
                    unset($this->commandes[$index]);
                }
            }
            foreach ($this->commandes as $commande) {
                $newCommandes[] = $commande;
            }
            if (!empty($newCommandes)) {
                $this->commandes = $newCommandes;
            } else {
                $commande = [];
            }
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

    public function GetArrayCommandes()
    {
        return $this->commandes;
    }
}
