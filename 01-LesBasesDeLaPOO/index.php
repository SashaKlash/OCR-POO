<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO Open Class Rooms</title>
</head>

<body>
    <h1>Les classes et objets</h1>

    <?php
    include 'config.php';
    include './classses/classesAutoLoad.php';
    include 'data/donnees.php';

    try {
        $db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';port=' . DB_PORT . ';charset=' . DB_CHARSET, DB_LOGIN, DB_PWD);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Code erreur : " . $e->getCode();
        echo "<br>Message d'erreur : " . $e->getMessage();
    }
    echo '<pre>';
    var_dump($db);
    echo '</pre>';

    $perso1 = new Personnage(array(
        'nom' => 'Sasha',
        'forcePerso' => 10,
        'degats' => 0,
        'niveau' => 5,
        'experience' => 10
    ));

    $manager = new PersonnageManager($db);
    $manager->add($perso1);

    $manager->getList();

    include 'model/request.php'
    ?>
</body>

</html>