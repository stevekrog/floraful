<?php
/**
 * animalObservation Class
 * Acknowledgements to Brian Yelle 
 * Author: Steve Krog 
 * Project for Backend Weblab Bootcamp Fall 2015
 */
class animalObservation extends Observation {

    private $_animalClass;
    private $_species;
    private $_distanceFromAnimal;
    private $_howDetected;
    private $_sex;
    private $_migrant;

    public function getanimalClass(){return $this->_animalClass;}
    public function setanimalClass($arg){$this->_animalClass = $arg;}

    public function getspecies(){return $this->_species;}
    public function setspecies($arg){$this->_species = $arg;}

    public function getdistanceFromAnimal(){return $this->_distanceFromAnimal;}
    public function setdistanceFromAnimal($arg){$this->_distanceFromAnimal = $arg;}

    public function gethowDetected(){return $this->_howDetected;}
    public function sethowDetected($arg){$this->_howDetected = $arg;}

    public function getsex(){return $this->_sex;}
    public function setsex($arg){$this->_sex = $arg;}

    public function getmigrant(){return $this->_migrant;}
    public function setmigrant($arg){$this->_migrant = $arg;}

    public function hydrate($arr) {
        parent::hydrate($arr);
        $this->setanimalClass(isset($arr["animalClass"])?$arr["animalClass"]:'');
        $this->setspecies(isset($arr["species"])?$arr["species"]:'');
        $this->setdistanceFromAnimal(isset($arr["distanceFromAnimal"])?$arr["distanceFromAnimal"]:'');
        $this->sethowDetected(isset($arr["howDetected"])?$arr["howDetected"]:'');
        $this->setsex(isset($arr["sex"])?$arr["sex"]:'');
        $this->setmigrant(isset($arr["migrant"])?$arr["migrant"]:'');
    }
}
