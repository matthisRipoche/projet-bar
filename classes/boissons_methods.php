<?php
include_once('classes/boisson.php');

class Boissons_metods
{
    public array $boissons = [];

    public function __construct()
    {
        $this->InitBoissons();
        $this->formProcess();
        $this->SaveBoissons();
    }

    public function InitBoissons()
    {
        if (isset($_COOKIE['boissons'])) {
            $dataBrut = json_decode($_COOKIE['boissons'], true);

            foreach ($dataBrut as $index => $data) {
                $newBoisson = new Boisson($index, $data);

                $this->boissons[] = $newBoisson;
            }
        }
    }

    private function AddBoisson()
    {
        if ((!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['prix']))) {
            $newBoisson = new Boisson(
                count($this->boissons),
                [
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'prix' => $_POST['prix']
                ]
            );

            $this->boissons[] = $newBoisson;
        }
    }

    private function SupprBoisson()
    {
        if (isset($_POST['supprID'])) {
            foreach ($this->boissons as $index => $boisson) {
                if ($boisson->getID() == $_POST['supprID']) {
                    unset($this->boissons[$index]);
                }
            }
            foreach ($this->boissons as $boisson) {
                $newBoissons[] = $boisson;
            }
            if (!empty($newBoissons)) {
                $this->boissons = $newBoissons;
            } else {
                $boisson = [];
            }
        }
    }

    private function EditBoisson()
    {
        if (!empty($_POST['newName']) || !empty($_POST['newDescription']) || !empty($_POST['newPrix'])) {
            foreach ($this->boissons as $boisson) {
                if ($boisson->getID() == $_POST['sameID']) {
                    if (!empty($_POST['newName'])) {
                        $boisson->setName($_POST['newName']);
                    }
                    if (!empty($_POST['newDescription'])) {
                        $boisson->setDescription($_POST['newDescription']);
                    }
                    if (!empty($_POST['newPrix'])) {
                        $boisson->setPrix($_POST['newPrix']);
                    }
                }
            }
        }
    }

    private function SaveBoissons()
    {
        $dataBrut = [];
        foreach ($this->boissons as $boisson) {
            $dataBrut[] = [
                'name' => $boisson->getName(),
                'description' => $boisson->getDescription(),
                'prix' => $boisson->getPrix()
            ];
        }

        setcookie("boissons", json_encode($dataBrut), strtotime("+1 year"));
    }

    private function formProcess()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->AddBoisson();
            $this->SupprBoisson();
            $this->EditBoisson();
        }
    }
}
