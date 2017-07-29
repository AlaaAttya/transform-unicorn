<?php

namespace Tests;

require_once  __DIR__ . './../vendor/autoload.php';

use Tests\Models\Person;
use Transformer\BaseTransformStrategy;
use PHPUnit\Framework\TestCase;
use Tests\Factories\DummyModelFactory;

/**
 * Class BaseTransformStrategyTest
 */
class BaseTransformStrategyTest extends TestCase
{
    /**
     * Test transform function
     *
     * @return void
     *
     * @author Alaa Attya <alaa.attya91@gmail.com>
     */
    public function testTransform(): void
    {
        $model = new DummyModelFactory();
        $modelObject = $model->getInstance();

        $transformStrategy = new BaseTransformStrategy();
        $dataArray = $transformStrategy->transform($modelObject);

        $expectedArray = [
            'name' => 'Alaa Attya',
            'email' => 'vidooman@gmail.com'
        ];

        $this->assertEquals($expectedArray, $dataArray);
    }

    /**
     * Test hydrate
     *
     * @return void
     *
     * @author Alaa Attya <alaa.attya91@gmail.com>
     */
    public function testHydrate(): void
    {
        $transformStrategy = new BaseTransformStrategy();
        $dataArray = [
            'name' => 'Alaa Attya',
            'email' => 'vidooman@gmail.com'
        ];
        $modelObject = $transformStrategy->hydrate($dataArray, Person::class);
        $this->assertEquals($dataArray['name'], $modelObject->getName());
        $this->assertEquals($dataArray['email'], $modelObject->getEmail());
    }
}
