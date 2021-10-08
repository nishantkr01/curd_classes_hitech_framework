<?php

class clsRegistration
{
    var $id;
    var $firstName;
    var $lastName;
    var $email;
    var $phone;
    var $city;
    var $message;



    function getId()
    {
        return $this->id;
    }
    function setId($Data)
    {
        $this->id = $Data;
    }

    function getFirstName()
    {
        return $this->firstName;
    }
    function setFirstName($Data)
    {
        $this->firstName = $Data;
    }

    function getLastName()
    {
        return $this->lastName;
    }
    function setlastName($Data)
    {
        $this->lastName = $Data;
    }

    function getEmail()
    {
        return $this->email;
    }
    function setEmail($Data)
    {
        $this->email = $Data;
    }

    function getPhone()
    {
        return $this->phone;
    }
    function setPhone($Data)
    {
        $this->phone = $Data;
    }

    function getCity()
    {
        return $this->city;
    }
    function setCity($Data)
    {
        $this->city = $Data;
    }

    function getMessage()
    {
        return $this->message;
    }
    function setMessage($Data)
    {
        $this->message = $Data;
    }
}
