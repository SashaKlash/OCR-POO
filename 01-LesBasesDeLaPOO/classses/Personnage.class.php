<?php
class Personnage
{
    private $_id;
    private $_nom;
    private $_forcePerso;
    private $_degats;
    private $_niveau;
    private $_experience;
    private static $_texteADire = 'Ca va dézinguer !';

    const FORCE_PETITE = 20;
    const FORCE_MOYENNE = 50;
    const FORCE_GRANDE = 80;

    public function __construct()
    {
    }

    public function hydrate(Personnage $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        // if (isset($donnees['id'])) {
        //     $this->setId($donnees['id']);
        // }
        // 
        // if (isset($donnees['nom'])) {
        //     $this->setNom($donnees['nom']);
        // }
        // 
        // if (isset($donnees['forcePerso'])) {
        //     $this->setForcePerso($donnees['forcePerso']);
        // }
        // 
        // if (isset($donnees['degats'])) {
        //     $this->setDegats($donnees['degats']);
        // }
        // 
        // if (isset($donnees['niveau'])) {
        //     $this->setNiveau($donnees['niveau']);
        // 
        // }
        // 
        // if (isset($donnees['experience'])) {
        // $this->setExperience($donnees['experience']);
        // }

    }
    ## Liste des getters

    public function id()
    {
        return $this->_id;
    }

    public function nom()
    {
        return $this->_nom;
    }

    public function forcePerso()
    {
        return $this->_forcePerso;
    }

    public function degats()
    {
        return $this->_degats;
    }

    public function niveau()
    {
        return $this->_niveau;
    }

    public function experience()
    {
        return $this->_experience;
    }

    ## Liste des setters

    public function setId($id)
    {
        // On convertit l'argument en nombre entier.
        // Si c'en était déjà un, rien ne changera.
        // Sinon, la converions donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
        $id = (int) $id;

        // On vérifie ensuite si ce nombre est bien strictement positif.
        if ($id > 0) {

            // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
            $this->_id = $id;
        }
    }

    public function setNom($nom)
    {
        if (is_string($nom) && strlen($nom) <= 30) {
            $this->_nom = $nom;
        }
    }

    public function setForcePerso($forcePerso)
    {
        $forcePerso = (int) $forcePerso;


        if ($forcePerso >= 1 && $forcePerso <= 100) {
            $this->_forcePerso = $forcePerso;
        }
    }

    public function setDegats($degats)
    {
        $degats = (int) $degats;

        if ($degats >= 0 && $degats <= 100) {
            $this->_degats = $degats;
        }
    }

    public function setNiveau($niveau)
    {
        $niveau = (int) $niveau;

        if ($niveau >= 1 && $niveau <= 100) {
            $this->_niveau = $niveau;
        }
    }


    public function setExperience($experience)
    {
        $experience = (int) $experience;

        if ($experience >= 1 && $experience <= 100) {
            $this->_experience = $experience;
        }
    }

    ## Liste des actions

    public function deplacer()
    {
    }

    public function frapper(Personnage $persoAFrapper)
    {
        $persoAFrapper->_degats += $this->_forcePerso;
        $this->gagnerExperience();
    }

    public function afficherDegats()
    {
        echo $this->_degats . "<br />";
    }

    public function gagnerExperience()
    {
        $this->_experience++;
    }

    public static function parler()
    {
        echo self::$_texteADire;
    }
}
