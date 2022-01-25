<?php


//connexion a PDO
$username= 'root';
$pwd = '';
$dsn = 'mysql://host=localhost;port=3306;dbname=cinema';
$connexion = new PDO($dsn, $username, $pwd, []);

//en mode console ou html
// var_dump($resltat);
$nom = 'poussel';
$prenom = 'olivier';
$sqlInsert = "INSERT INTO acteur(nom, prenom) VALUES(:nom,:prenom)";
$statement = $connexion->prepare($sqlInsert);
$statement->execute(['nom'=> $nom, 'prenom'=> $prenom]);
$id = $connexion->lastInsertId();

$sqlUpdate = 'UPDATE acteur SET nom = :nom, prenom = :prenom WHERE id = :id';
$statement = $connexion->prepare($sqlUpdate);
$statement->execute(['id'=> $id, 'nom'=> 'Doe', 'prenom'=> 'john']);

//requete et affichage des Acteurs
$sql = 'SELECT * FROM acteur';
$statement = $connexion->query($sql);
$statement->execute();
$resltat = $statement->fetchAll(PDO::FETCH_ASSOC);
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
            <?php foreach ($resltat as $acteur) :  ?>
                <tr>
                    <td><?= $acteur['id']; ?></td>
                    <td><?= $acteur['nom']; ?></td>
                    <td><?= $acteur['prenom']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>




