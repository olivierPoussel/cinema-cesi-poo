<?php

namespace App\Controller;

use App\Entity\Acteur;
use App\Repository\ActeurRepository;

class ActeurController extends AbstractController
{
    /** @var ActeurRepository */
    private $acteurRepo;

    public function __construct()
    {
        $this->acteurRepo = new ActeurRepository();
    }

    public function list()
    {
        $acteurs = $this->acteurRepo->findAll();
        $title = 'Liste Acteur';
        //recup la vue pour affichage
        $this->renderView('acteur/liste', compact('acteurs', 'title'));
    }

    public function detail()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if ($id) {
            /** @var Acteur */
            $acteur = $this->acteurRepo->findById($id);
            $title = 'ficher de ' . $acteur->getNom();
            $this->renderView('acteur/detail', compact('acteur', 'title'));
        }
    }
}
