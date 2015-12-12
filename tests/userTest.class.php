<?php
require_once('../models/user.class.php');

class userTest extends PHPUnit_Framework_TestCase{

    public function testUserObjectCanBeConstructed()
    {
        $u = new user();

        $this->assertInstanceOf(User::class, $u);

        return $u;
    }

    public function testNameSetAndGet()
    {
        $u = new user();

        $expectedName = 'Jane Doe';

        $u->setName($expectedName);

        $this->assertSame($expectedName, $u->getName(), 'Setter/Getter Failure: User:Name');

    }

    public function testEmailSetAndGet()
    {
        $u = new user();

        $expectedMail = 'JaneDoe@google.com';

        $u->setMail($expectedMail);

        $this->assertSame($expectedMail, $u->getMail(), 'Setter/Getter Failure: User:Mail');

    }

    public function testEmailIsInvalid()
    {

        $u = new user();

        $invalidMail = 'JaneDoe';

        $u->setMail($invalidMail);

        $this->assertEmpty($u->getMail(), 'Invalid Email NOT converted to an empty string User:Mail');

    }


    public function testRoleOneIsAdmin()
    {

        $u = new user();

        $u->setRole(1);

        $this->assertTrue($u->isAdmin());

    }

     public function testRoleTwoIsNotAdmin()
    {

        $u = new user();

        $u->setRole(2);

        $this->assertFalse($u->isAdmin());

    }

     public function testHydrate()
    {
        $u = new user();

        $uid = 5;
        $name = "John Doe";
        $pass = "SecretPassword";
        $mail = "john.doe@test.com";
        $created = time();
        $role = 1;

        $arr = array();

        $arr["uid"] = $uid;
        $arr["name"]  = $name;
        $arr["pass"]  = $pass;
        $arr["mail"]  = $mail;
        $arr["created"]  = $created;
        $arr["role"]  = $role;


        $u->hydrate($arr);

        $this->assertSame($uid, $u->getUID(), 'Hydrate/Getter Failure: User:UID');
        $this->assertSame($name, $u->getName(), 'Hydrate/Getter Failure: User:Name');
        $this->assertSame($pass, $u->getPassword(), 'Hydrate/Getter Failure: User:Password');
        $this->assertSame($mail, $u->getMail(), 'Hydrate/Getter Failure: User:Mial');
        $this->assertSame($created, $u->getCreated(), 'Hydrate/Getter Failure: User:Created');
        $this->assertSame($role, $u->getRole(), 'Hydrate/Getter Failure: User:Role');

    }
}

?>
