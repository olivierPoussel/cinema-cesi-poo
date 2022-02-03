<?php

namespace App\Controller;

use App\Entity\Acteur;
use App\Repository\ActeurRepository;

class ActeurController
{
    public function list()
    {
        $acteur = new ActeurRepository();
        $acteurs = $acteur->findAll();
        //recup la vue pour affichage
        require_once('./src/view/acteur/liste.phtml');
    }

    public function detail()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if ($id) {
            $acteurRepo = new ActeurRepository();
            $acteur = $acteurRepo->findById($id);

            require_once('./src/view/acteur/detail.phtml');
        }
    }
}
