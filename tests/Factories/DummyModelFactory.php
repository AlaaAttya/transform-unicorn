<?php

namespace Tests\Factories;

use Tests\Models\Person;

/**
 * Class DummyModelFactory
 *
 * @package Tests\Factories
 * @author  Alaa Attya <alaa.attya91@gmail.com>
 */
class DummyModelFactory
{
    /**
     * Model
     *
     * @var Person
     */
    public $model;

    /**
     * DummyModelFactory constructor.
     */
    public function __construct()
    {
        $this->model = Person::class;
    }

    /**
     * Get model instance
     *
     * @return \Tests\Models\Person
     *
     * @author Alaa Attya <alaa.attya91@gmail.com>
     */
    public function getInstance(): Person
    {
        //$model = $this->model;
        $person = new Person();
        $person->setEmail('vidooman@gmail.com');
        $person->setName('Alaa Attya');

        return $person;
    }
}