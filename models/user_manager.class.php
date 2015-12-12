<?php
/**
 * UserManager Class
 * Acknowledgements to Brian Yelle
 * Author: Steve Krog 
 * Project for Backend Weblab Bootcamp Fall 2015
 */

class UserManager
{

    public function authenticate($email, $password){
        $db = new Db();

        $email = $db->quote($email);
        $results = $db->select("select * from users where email = $email");

        if(!$results){
          return FALSE;
        }

        foreach($results as $result){
          $user = new User();
          $user->hydrate($result);
        }

        //   if(password_verify($password, $user->getPassword())){
        if($password == $user->getpassword()){
            $result = $db->query("update users set lastLogin=now() where email = $email");

        	if(!$result){
        		return FALSE;
        	}
        	return $user;
        }
        else{
        	return FALSE;
        }
    }

    public function getUser($arg){

        $db = new Db();

        $email = $db->quote($arg);
        $results = $db->select("select * from users where email = $email limit 1");

        foreach($results as $result){
            $user = new User();
            $user->hydrate($result);
        }

        return $user;
    }

    public function getAllRoles(){

        $db = new Db();
        $roles = array();

        $roles = $db->select("select * from roles order by sortOrder asc");

        return $roles;
    }

    public function getUserRole(){
        $db = new Db();
        $roles = array();

        $roles = $db->select("select * from roles where roleName = 'user' limit 1");

        return $roles;
    }

    public function getAllUsers(){
        $db = new Db();
        $users = array();

        $results = $db->select("select * from users");

        foreach($results as $result){
            $user = new User();
            $user->hydrate($result);
            $users[] = $user;
        }

    return $users;
    }

    public function save($user){
        if ($user->getcreated()){          
          $success = $this->_update($user);

          if($success){
            return TRUE;
          }
          else{
            return FALSE;
          }
        }
        else{
          $success = $this->_add($user);

          if($success){
            return TRUE;
          }
          else{
            return FALSE;
          }
        }
    }

    private function _add($user){
        $db = new Db();

        $name = $db->quote($user->getname());
        $email = $db->quote($user->getemail());
        // $pass = password_hash($user->getPassword(), PASSWORD_BCRYPT, array("cost" => 10));
        // $pass = $db->quote($pass);
        $password = $db->quote($user->getpassword());
        $role = $db->quote($user->getrole());

        // can't insert new user with same email as existing user
        $dbemails = $db->select("select email from users;");

        foreach($dbemails as $dbemail){
        	foreach($dbemail as $value){
        		if($value == str_replace("'","",$email)){
        			print("<b>Email Address already in database. Please choose another.</b>");
        			return FALSE;
        		}
        	}
        }

        $results = $db->query("insert into users (email, name, password, created, lastLogin, roleid)
                                values ($email, $name, $password, now(), NULL, $role);");

        if($results){
        	return TRUE;
        }

    }

    private function _update($user){
        $db = new Db();

        $email = $db->quote($user->getemail());
        $name = $db->quote($user->getname());
        $role = $db->quote($user->getrole());

        if($user->getpassword()){
        //   $pass = password_hash($user->getPassword(), PASSWORD_BCRYPT, array("cost" => 10));
        //   $pass = $db->quote($pass);
            $password = $db->quote($user->getpassword());
        }
        else{
            $password = '';
        }

        if(!empty($password)){
            $results = $db->query("update users set name=$name, password=$password, roleid=$role where email = $email;");
        }
        else{
            $results = $db->query("update users set name=$name, roleid=$role where email = $email;");
        }

        if($results){
            return TRUE;
        }
    }

    public function delete($arg){

          $db = new Db();

          $email = $db->quote($arg);
          $results = $db->query("delete from users where email = $email");
    }

}
