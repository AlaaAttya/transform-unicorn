<?php

require_once __DIR__ . './../vendor/autoload.php';
use Tests\Models\Person;


$transformer = new Transformer\BaseTransformStrategy();

$testArray = [
    'name' => 'alaa',
    'email' => 'alaa.attya91@gmail.com'
];

// hydrate array to get an object
$object = $transformer->hydrate($testArray, Person::class);
var_dump($object);

// Transform object to get its array
print_r($transformer->transform($object));