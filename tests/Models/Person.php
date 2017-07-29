<?php

namespace Tests\Models;

/**
 * Class Person
 *
 * @package Tests\Models
 * @author Alaa Attya <alaa.attya91@gmail.com>
 */
class Person
{
    public $map = [
        'name',
        'email'
    ];

    private $name;

    private $email;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function toArray(): array
    {
        return [
            'name'  => $this->getName(),
            'email' => $this->getEmail(),
        ];
    }
}