Universal transformer unicorn
=============================

This package is used to transform an array to it's related model and transform a model object to an array.

for example, if you have a `Person` model and you need to create a new object of that model with specific data
you might use the following snippet

```php
$transformer = new Transformer\BaseTransformStrategy();

$testArray = [
    'name' => 'alaa',
    'email' => 'alaa.attya91@gmail.com'
];

// hydrate array to get an object
$object = $transformer->hydrate($testArray, Person::class);

```

and if you need to transform that model object to array you might use the following snippet

```php
$transformer->transform($object)
```