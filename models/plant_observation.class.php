<?php
/**
 * plantObservation Class
 * Acknowledgements to Brian Yelle
 * Author: Steve Krog 
 * Project for Backend Weblab Bootcamp Fall 2015
 */
class plantObservation extends Observation {

    private $_plantName;
    private $_soilDesc;

    public function getplantName(){return $this->_plantName;}
    public function setplantName($arg){$this->_plantName = $arg;}

    public function getsoilDesc(){return $this->_soilDesc;}
    public function setsoilDesc($arg){$this->_soilDesc = $arg;}

    public function hydrate($arr) {
        parent::hydrate($arr);
        $this->setPlantName(isset($arr["plantName"])?$arr["plantName"]:'');
        $this->setSoilDesc(isset($arr["soilDesc"])?$arr["soilDesc"]:'');
    }
}
