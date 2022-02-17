<?php
class Compteur
{
    private $_compteur = 0;

    public function __construct()
    {
        $this->_compteur++;
    }

    public function getCompteur()
    {
        return $this->_compteur;
    }
}
