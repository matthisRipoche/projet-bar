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

class Boissons_methods
{
    public array $boissons = [];

    public function __construct()
    {
        $this->InitBoissons();
        $this->FormProcess();
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

    private function FormProcess()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->AddBoisson();
            $this->SupprBoisson();
            $this->EditBoisson();
        }
    }

    public function GetArrayBoissons()
    {
        return $this->boissons;
    }

    public function SetArrayBoissons($boissons)
    {
        $this->boissons = $boissons;
    }
}
