<?php
/**
 * ObservationsManager Class
 * Acknowledgements to Brian Yelle
 * Author: Steve Krog 
 * Project for Backend Weblab Bootcamp Fall 2015
 */

class ObservationsManager
{

    public function getUserObs($email, $obstype){
        $db = new Db();
        $observations = array();
        $email = $db->quote($email);

        if($obstype == PLANT){
            $results = $db->select("select oid, observerName, email, observationDateTime
            , weatherDesc, currentTemp, highTemp, lowTemp, locationDesc, latitude, longitude
            , notes, plantName, soilDesc, obstypeid from observations where email = $email");

            if($dberror = $db->error()){
                echo "getuserobs plant db error: ", $dberror;
            }

            foreach($results as $result){
                $plantObs = new plantObservation();
                $plantObs->hydrate($result);
                $observations[] = $plantObs;
            }
        }
        elseif($obstype == BIRD){
            $results = $db->select("select oid, observerName, email, observationDateTime
                        , weatherDesc, currentTemp, highTemp, lowTemp, locationDesc, latitude, longitude, notes
                        , animalClass, species, distanceFromAnimal, howDetected
                        , sex, migrant, nestObserved, numEggsInNest, obstypeid
                        from observations where email = $email limit 1");

            if($dberror = $db->error()){
                echo "getuserobs bird db error: ", $dberror;
            }

            foreach($results as $result){
                $birdObs = new birdObservation();
                $birdObs->hydrate($result);
                $observations[] = $birdObs;
            }
        }
        else{
            // figure
            return FALSE;
        }

        return $observations;
    }

    public function getObs($arg){
        if(!is_numeric($arg)){ return FALSE; }

        $db = new Db();

        $oid = $db->quote($arg);
        $obstype = $this->getObsType($arg);

        if($obstype == PLANT){
            $results = $db->select("select oid, observerName, email, observationDateTime,
                        weatherDesc, currentTemp, highTemp, lowTemp, locationDesc, latitude, longitude, notes
                        , plantName, soilDesc, obstypeid from observations where oid = $oid limit 1");

            if($dberror = $db->error()){
                echo "getobs plant db error: ", $dberror;
            }

			foreach($results as $result){
				$plantObs = new plantObservation();
				$plantObs->hydrate($result);
				$observations[] = $plantObs;
			}
			return $plantObs;
        }
        elseif($obstype == BIRD){
            $results = $db->select("select oid, observerName, email, observationDateTime
                        , weatherDesc, currentTemp, highTemp, lowTemp, locationDesc, latitude, longitude, notes
                        , animalClass, species, distanceFromAnimal, howDetected
                        , sex, migrant, nestObserved, numEggsInNest, obstypeid
                        from observations where oid = $oid limit 1");

            if($dberror = $db->error()){
                echo "getobs bird db error: ", $dberror;
            }

			foreach($results as $result){
				$birdObs = new birdObservation();
				$birdObs->hydrate($result);
				$observations[] = $birdObs;
			}
			return $birdObs;
        }
        else {
            return FALSE;
        }
    }

    public function getAllObs($obstype){
        $db = new Db();
        $observations = array();

        if($obstype == PLANT){
            $results = $db->select("select oid, observerName, email, observationDateTime 
            , weatherDesc, currentTemp, highTemp, lowTemp, locationDesc, latitude, longitude
            , notes, plantName, soilDesc, obstypeid from observations");

            if($dberror = $db->error()){
                echo "getAllObs plant db error: ", $dberror;
            }

            foreach($results as $result){
                $plantObs = new plantObservation();
                $plantObs->hydrate($result);
                $observations[] = $plantObs;
            }
        }
        elseif($obstype == BIRD){
            $results = $db->select("select oid, observerName, email, observationDateTime
                        , weatherDesc, currentTemp, highTemp, lowTemp, locationDesc, latitude, longitude, notes
                        , animalClass, species, distanceFromAnimal, howDetected
                        , sex, migrant, nestObserved, numEggsInNest, obstypeid
                        from observations");

            if($dberror = $db->error()){
                echo "getAllObs bird db error: ", $dberror;
            }

            foreach($results as $result){
                $birdObs = new birdObservation();
                $birdObs->hydrate($result);
                $observations[] = $birdObs;
            }
        }
        else{
            print "getAllObs: Invalid Observation Type Submitted";
            return FALSE;
        }

        return $observations;
    }

    public function save($observation){

        if($observation->getoid()){
            
          $success = $this->_update($observation);

          if($success){
            return TRUE;
          }
          else{
            return FALSE;
          }
        }
        else{

          $success = $this->_add($observation);

          if($success){
            return TRUE;
          }
          else{
            return FALSE;
          }
        }
    }

    private function _add($observation){
        $db = new Db();

        $observerName = $db->quote($observation->getobserverName());
        $email = $db->quote($observation->getemail());
        $obsDateTime = $db->quote($observation->getobsDateTime());
        $weatherDesc = $db->quote($observation->getweatherDesc());
        $currTemp = $db->quote($observation->getcurrentTemp());
        $highTemp = $db->quote($observation->gethighTemp());
        $lowTemp = $db->quote($observation->getlowTemp());
        $locDesc = $db->quote($observation->getlocationDesc());
        $lat = $db->quote($observation->getlatitude());
        $long = $db->quote($observation->getlongitude());
        $notes = $db->quote($observation->getnotes());
        $obstypeid = $db->quote($observation->getobstypeid());

        if(str_replace("'","",$obstypeid) == PLANT){ // plant
            $plantName = $db->quote($observation->getplantName());
            $soilDesc = $db->quote($observation->getsoilDesc());

            $results = $db->query("insert into observations (observerName, email, observationDateTime, weatherDesc
                                    , currentTemp, highTemp, lowTemp, locationDesc, latitude
                                    , longitude, notes, plantName, soilDesc, obstypeid)
                                values ($observerName, $email, now(), $weatherDesc
                                    , $currTemp, $highTemp, $lowTemp, $locDesc, $lat
                                    , $long, $notes, $plantName, $soilDesc, $obstypeid);");
            if($dberror = $db->error()){
                echo "_add plant db error: ", $dberror;
            }

        } elseif (str_replace("'","",$obstypeid) == BIRD) {
            $animalClass = $db->quote($observation->getanimalClass());
            $species = $db->quote($observation->getspecies());
            $distanceFromAnimal = $db->quote($observation->getdistanceFromAnimal());
            $howDetected = $db->quote($observation->gethowDetected());
            $sex = $db->quote($observation->getsex());
            $migrant = $db->quote($observation->getmigrant());
            $nestObserved = $db->quote($observation->getnestObserved());
            $numEggsInNest = $db->quote($observation->getnumEggsInNest());

            $results = $db->query("insert into observations (observerName, email, observationDateTime, weatherDesc, currentTemp, highTemp, lowTemp, locationDesc,
                                    latitude, longitude, notes, animalClass, species, distanceFromAnimal
                                    , howDetected, sex, migrant, nestObserved, numEggsInNest, obstypeid)
                                values ($observerName, $email, $obsDateTime, $weatherDesc
                                    , $currTemp, $highTemp, $lowTemp, $locDesc, $lat, $long, $notes
                                    , $animalClass, $species, $distanceFromAnimal, $howDetected
                                    , $sex, $migrant, $nestObserved, $numEggsInNest $obstypeid);");

            if($dberror = $db->error()){
                echo "_add: bird db error: ", $dberror;
            }

        } else {
            print "_add: Invalid Observation Type Submitted";
            return FALSE;
        }
    }

    private function _update($observation){
        $db = new Db();

        $oid = $db->quote($observation->getoid());
        $observerName = $db->quote($observation->getobserverName());
        $email = $db->quote($observation->getemail());
        $obsDateTime = $db->quote($observation->getobsDateTime());
        $plantName = $db->quote($observation->getplantName());
        $soilDesc = $db->quote($observation->getsoilDesc());
        $weatherDesc = $db->quote($observation->getweatherDesc());
        $currTemp = $db->quote($observation->getcurrentTemp());
        $highTemp = $db->quote($observation->gethighTemp());
        $lowTemp = $db->quote($observation->getlowTemp());
        $locDesc = $db->quote($observation->getlocationDesc());
        $lat = $db->quote($observation->getlatitude());
        $long = $db->quote($observation->getlongitude());
        $notes = $db->quote($observation->getnotes());
        $obstypeid = $db->quote($observation->getobstypeid());

        if(str_replace("'","",$obstypeid) == PLANT){

            $plantName = $db->quote($observation->getplantName());
            $soilDesc = $db->quote($observation->getsoilDesc());

            $results = $db->query("update observations set
                        observerName = $observerName
                        , observationDateTime = $obsDateTime
                        , weatherDesc = $weatherDesc
                        , currentTemp = $currTemp
                        , highTemp = $highTemp
                        , lowTemp = $lowTemp
                        , locationDesc = $locDesc
                        , latitude = $lat
                        , longitude = $long
                        , notes = $notes
                        , plantName = $plantName
                        , soilDesc = $soilDesc
                        , email = $email
                        , obstypeid = $obstypeid
                        where oid = $oid;");

            if($dberror = $db->error()){
                echo "_update plant db error: ", $dberror;
            }

        } elseif (str_replace("'","",$obstypeid) == BIRD) { // bird
            $animalClass = $db->quote($observation->getanimalClass());
            $species = $db->quote($observation->getspecies());
            $distanceFromAnimal = $db->quote($observation->getdistanceFromAnimal());
            $howDetected = $db->quote($observation->gethowDetected());
            $sex = $db->quote($observation->getsex());
            $migrant = $db->quote($observation->getmigrant());
            $nestObserved = $db->quote($observation->getnestObserved());
            $numEggsInNest = $db->quote($observation->getnumEggsInNest());

            $results = $db->query("update observations set
                        oid = $oid
                        , observerName = $observerName
                        , obsDateTime = $obsDateTime
                        , weatherDesc = $weatherDesc
                        , currentTemp = $currTemp
                        , highTemp = $highTemp
                        , lowTemp = $lowTemp
                        , locationDesc = $locDesc
                        , latitude = $lat
                        , longitude = $long
                        , notes = $notes
                        , animalClass = $animalClass
                        , species = $species
                        , distanceFromAnimal = $distanceFromAnimal
                        , howDetected = $howDetected
                        , sex = $sex
                        , migrant = $migrant
                        , nestObserved = $nestObserved
                        , numEggsInNest = $numEggsInNest
                        , email = $email
                        , obstypeid = $obstypeid
                        where oid = $oid;");

            if($dberror = $db->error()){
                echo "_update bird db error: ", $dberror;
            }

        } else {
            print "_update: Invalid Observation Type Submitted";
            return FALSE;
        }
    }

    public function saveObsToFile($obstype){
        $db = new Db();

        if($obstype == PLANT){
            $results = $db->select("select oid, observerName, email, observationDateTime
    			, weatherDesc, currentTemp, highTemp, lowTemp, locationDesc, latitude, longitude
    			, notes, plantName, soilDesc, obstypeid from observations where obstypeid = $obstype;");

    		if (!$results){
    			die('Couldn\'t fetch records');
		    }
        }
        elseif($obstype == BIRD){
            $results = $db->select("select oid, observerName, email, observationDateTime
                , weatherDesc, currentTemp, highTemp, lowTemp, locationDesc, latitude, longitude
                , notes, , animalClass, species, distanceFromAnimal, howDetected, sex, migrant
                , nestObserved, numEggsInNest, obstypeid from observations where obstypeid = $obstype;");

            if (!$results){
                die('Couldn\'t fetch records');
            }
        }
        else{
            print "saveObsToFile: Invalid Observation Type Submitted";
            return FALSE;
        }

		$headers = array_keys($results[0]);

		$fp = fopen('php://output', 'w+');
		if ($fp && $results){
			header('Content-Type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment; filename="export.csv"');
			header('Pragma: no-cache');
			header('Expires: 0');
			fputcsv($fp, $headers);
			foreach($results as $result){
				fputcsv($fp, $result);
			}
			fclose($fp);
			exit(0);
		}
    }

    public function getObsType($arg){
        $db = new Db();
        $oid = $db->quote($arg);
        $obstidresults = $db->select("select obstypeid from observations where oid = $oid limit 1");

        foreach($obstidresults as $obstidresult){
            foreach($obstidresult as $value){
                $observationType = $value;
            }
        }

        return $observationType;
    }

    public function delete($arg){
        $db = new Db();
        $oid = $db->quote($arg);
        $results = $db->query("DELETE from observations where oid = $oid");

        if($dberror = $db->error()){
            echo "delete: db error: ", $dberror;
        }
    }
}
