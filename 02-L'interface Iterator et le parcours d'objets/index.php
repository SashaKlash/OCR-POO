<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iterator PHP</title>
</head>

<body>
    <h1>Iterator en PHP - Giraud</h1>
    <?php
    // Definition d'une classe
    class Test implements Iterator
    {
        private $tableau = array();
        private $position = 0;

        public function __construct(array $tb)
        {
            $this->tableau = $tb;
            $this->position = 0;
        }

        public function rewind()
        {
            echo 'Retour au début du tableau<br />';
            reset($this->tableau);
            var_dump(__METHOD__);
            $this->position = 0;
        }

        public function current()
        {
            $tableau = current($this->tableau);
            echo 'Élement actuel : ' . $tableau . '<br >';
            var_dump(__METHOD__);
            return $tableau;
        }

        public function key()
        {
            $tableau = key($this->tableau);
            echo 'Clef : ' . $tableau . '.<br />';
            return $tableau;
        }
        public function next()
        {
            $tableau = next($this->tableau);
            echo 'Élement suivant : ' . $tableau . ' <br />';
            return $tableau;
        }

        public function valid()
        {
            $clef = key($this->tableau);
            $tableau = ($clef !== NULL && $clef !== FALSE);
            echo 'Valide : ';
            var_dump($tableau);
            echo '<br />';
            return $tableau;
        }
    }

    $tbtest = ['chat' => 'animal', 'chaise' => 'meuble', 'rouge' => 'couleur'];
    $object = new Test($tbtest);
    foreach ($object as $c => $v) {
        echo $c . ' = ' . $v . ' <br /><br />';
    }
    ?>
</body>

</html>