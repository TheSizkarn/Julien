<?php
/**
 * Created by PhpStorm.
 * User: TheSiz
 * Date: 31/07/2017
 * Time: 22:34
 */
class Personnage
{
    private $_id;
    private $_nom;
    private $_forcePerso;
    private $_degats;
    private $_niveau;
    private $_experience;

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    // Liste des getters

    public function id() { return $this->_id; }
    public function nom() { return $this->_nom; }
    public function forcePerso() { return $this->_forcePerso; }
    public function degats() { return $this->_degats; }
    public function niveau() { return $this->_niveau; }
    public function experience() { return $this->_experience; }

    // Liste des setters
    public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0)
        {
            $this->_id = $id;
        }
    }

    public function setNom($nom)
    {
        if (is_string($nom) && strlen($nom) <=30)
        {
            $this->_nom = $nom;
        }
    }

    public function setForcePerso($forcePerso)
    {
        $forcePerso = (int) $forcePerso;

        if ($forcePerso >= 0 && $forcePerso <= 100)
        {
            $this->_forcePerso = $forcePerso;
        }
    }

    public function setDegats($degats)
    {
        $degats = (int) $degats;

        if ($degats >= 0 && $degats <= 100)
        {
            $this->_degats = $degats;
        }
    }

    public function setNiveau($niveau)
    {
        $niveau = (int) $niveau;

        if ($niveau >= 0)
        {
            $this->_niveau = $niveau;
        }
    }

    public function setExperience($experience)
    {
        $experience = (int) $experience;

        if ($experience >= 0 && $experience <= 100)
        {
            $this->_experience = $experience;
        }
    }
}