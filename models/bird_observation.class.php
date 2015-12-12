<?php
/**
* birdObservation Class
* Acknowledgements to Brian Yelle 
* Author: Steve Krog 
* Project for Backend Weblab Bootcamp Fall 2015
*/
class birdObservation extends animalObservation 
{

    private $_nestObserved;
    private $_numEggsInNest;

    public function getnestObserved(){return $this->_nestObserved;}
    public function setnestObserved($arg){$this->_nestObserved = $arg;}

    public function getnumEggsInNest(){return $this->_numEggsInNest;}
    public function setnumEggsInNest($arg){$this->_numEggsInNest = $arg;}

    public function hydrate($arr) {
    parent::hydrate($arr);
    $this->setnestObserved(isset($arr["nestObserved"])?$arr["nestObserved"]:'');
    $this->setnumEggsInNest(isset($arr["numEggsInNest"])?$arr["numEggsInNest"]:'');
    }
}
