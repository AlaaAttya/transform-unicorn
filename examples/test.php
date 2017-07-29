<?php
/**
 * Created by PhpStorm.
 * User: alaaattya
 * Date: 7/23/17
 * Time: 7:38 PM
 */

$transformer = new Transformer\BaseTransformStrategy();

$testArray = [
    'name' => 'alaa',
    'email' => 'alaa.attya91@gmail.com'
];
$p = new Person();
$transformer->hydrate($testArray, $p);