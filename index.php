<?php
require_once('./vendor/autoload.php');

use App\Entity\Acteur;
use App\Repository\ActeurRepository;

$acteur = new ActeurRepository();

$resultat = $acteur->findAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDD CESI</title>
</head>

<body>
    <h1>Acteur</h1>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prenom</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultat as $acteur) :  ?>
                <tr>
                    <td><?= $acteur->getId(); ?></td>
                    <td><?= $acteur->getNom(); ?></td>
                    <td><?= $acteur->getPrenom(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>