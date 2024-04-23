<?php
include_once('classes/boisson.php');

class Boissons
{
    public $boissons;
    private $flagName;

    public function __construct()
    {
        $this->InitBoissons();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->IsNameUsed();
            $this->AddBoisson();
            $this->SupprBoisson();
            $this->EditBoisson();
        }

        $this->RegisterBoissons();
    }

    public function InitBoissons()
    {
        $this->boissons = json_decode($_COOKIE['boisson'], true);
    }

    public function IsNameUsed()
    {
        $this->flagName = 1;
        foreach ($this->boissons as $boisson) {
            if ($boisson['name'] == $_POST['name']) {
                $this->flagName = 0;
                break;
            }
        }
    }

    public function AddBoisson()
    {
        if ((!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['prix']))) {
            if ($this->flagName == 1) {
                $newBoisson = [
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'prix' => $_POST['prix']
                ];

                $this->boissons[] = $newBoisson;
            } else {
                echo "<p>Ce nom est déja pris</p>";
            }
            sort($this->boissons);
        }
    }

    public function SupprBoisson()
    {
        if (!empty($_POST['supprName'])) {
            $supprName = $_POST['supprName'];
            foreach ($this->boissons as $key => $boisson) {
                if ($boisson['name'] == $supprName) {
                    unset($this->boissons[$key]);
                }
            }
            foreach ($this->boissons as $boisson) {
                $newBoissons[] = $boisson;
            }
            $this->boissons = $newBoissons;
        }
    }

    public function EditBoisson()
    {
        if (!empty($_POST['newName']) || !empty($_POST['newDescription']) || !empty($_POST['newPrix'])) {
            foreach ($this->boissons as $key => $boisson) {
                if ($boisson['name'] == $_POST['editName2']) {
                    if (!empty($_POST['newName'])) {
                        $this->boissons[$key]['name'] = $_POST['newName'];
                    }
                    if (!empty($_POST['newDescription'])) {
                        $this->boissons[$key]['description'] = $_POST['newDescription'];
                    }
                    if (!empty($_POST['newPrix'])) {
                        $this->boissons[$key]['prix'] = $_POST['newPrix'];
                    }
                }
            }
        }
    }

    public function RegisterBoissons()
    {
        setcookie("boisson", json_encode($this->boissons), strtotime("+1 year"));
    }
}
