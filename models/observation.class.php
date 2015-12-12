<?php

/**
* Observation Class
* Acknowledgements to Brian Yelle 
* Author: Steve Krog 
* Project for Backend Weblab Bootcamp Fall 2015
*/

class Observation{

    private $_oid;
    private $_email;
    private $_obstypeid; // plant, bird, etc.
    private $_observerName;
    private $_obsDateTime;
    private $_weatherDesc;
    private $_currentTemp;
    private $_highTemp;
    private $_lowTemp;
    private $_locationDesc;
    private $_latitude;
    private $_longitude;
    private $_notes;

    public function getoid(){return $this->_oid;}
    public function setoid($arg){$this->_oid = $arg;}

    public function getemail(){return $this->_email;}
    public function setemail($arg){$this->_email = $arg;}

    public function getobstypeid(){return $this->_obstypeid;}
    public function setobstypeid($arg){$this->_obstypeid = $arg;}

    public function getobserverName(){return $this->_observerName;}
    public function setobserverName($arg){$this->_observerName = $arg;}

    public function getobsDateTime(){return $this->_obsDateTime;}
    public function setobsDateTime($arg){$this->_obsDateTime = $arg;}

    public function getweatherDesc(){return $this->_weatherDesc;}
    public function setweatherDesc($arg){$this->_weatherDesc = $arg;}

    public function getcurrentTemp(){return $this->_currentTemp;}
    public function setcurrentTemp($arg){$this->_currentTemp = $arg;}

    public function gethighTemp(){return $this->_highTemp;}
    public function sethighTemp($arg){$this->_highTemp = $arg;}

    public function getlowTemp(){return $this->_lowTemp;}
    public function setlowTemp($arg){$this->_lowTemp = $arg;}

    public function getlocationDesc(){return $this->_locationDesc;}
    public function setlocationDesc($arg){$this->_locationDesc = $arg;}

    public function getlatitude(){return $this->_latitude;}
    public function setlatitude($arg){$this->_latitude = $arg;}

    public function getlongitude(){return $this->_longitude;}
    public function setlongitude($arg){$this->_longitude = $arg;}

    public function getnotes(){return $this->_notes;}
    public function setnotes($arg){$this->_notes = $arg;}

    public function hydrate($arr) {
        $this->setoid(isset($arr["oid"])?$arr["oid"]:'');
        $this->setemail(isset($arr["email"])?$arr["email"]:'');
        $this->setobserverName(isset($arr["observerName"])?$arr["observerName"]:'');
        $this->setobstypeid(isset($arr["obstypeid"])?$arr["obstypeid"]:'');
        $this->setobsDateTime(isset($arr["observationDateTime"])?$arr["observationDateTime"]:'');
        $this->setweatherDesc(isset($arr["weatherDesc"])?$arr["weatherDesc"]:'');
        $this->setcurrentTemp(isset($arr["currentTemp"])?$arr["currentTemp"]:'');
        $this->sethighTemp(isset($arr["highTemp"])?$arr["highTemp"]:'');
        $this->setlowTemp(isset($arr["lowTemp"])?$arr["lowTemp"]:'');
        $this->setlocationDesc(isset($arr["locationDesc"])?$arr["locationDesc"]:'');
        $this->setlatitude(isset($arr["latitude"])?$arr["latitude"]:'');
        $this->setlongitude(isset($arr["longitude"])?$arr["longitude"]:'');
        $this->setnotes(isset($arr["notes"])?$arr["notes"]:'');
    }
}
