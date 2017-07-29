<?php

namespace Transformer;

/**
 * Class BaseTransformStrategy
 *
 * @package AlaaAttya\Transformer
 *
 * @author  Alaa Attya <alaa.attya91@gmail.com>
 */
class BaseTransformStrategy
{
    /**
     * Attributes map
     *
     * @var array
     */
    protected $map;

    /**
     * Hydrate array
     *
     * @param array $objectArray array to be hydrated
     * @param mixed $className   class name
     *
     * @return mixed
     *
     * @author Alaa Attya <alaa.attya@tajawal.com>
     */
    public function hydrate(array $objectArray, $className)
    {
        $object = new $className();
        foreach ($objectArray as $key => $value) {
            $setterFunctionName = 'set' . ucfirst($key);
            if ($this->_objectHasFunction($object, $setterFunctionName)) {
                $object->$setterFunctionName($value);
            }
        }

        return $object;
    }

    /**
     * Transform object to array
     * If the object has a `toArray` function, the call it
     * If not, loop through object's attributes
     * and try to call its setters and getters
     *
     * @param mixed $object object
     *
     * @return array
     *
     * @author Alaa Attya <alaa.attya@tajawal.com>
     */
    public function transform($object): array
    {
        if ($this->_objectHasFunction($object, 'toArray')) {
            // Object has `toArray` function
            return $object->toArray();
        } else {
            return $this->_mapObjectArray($object);
        }
    }

    /**
     * Check if object and has `toArray` function to be used
     *
     * @param mixed  $object   object
     * @param string $function function name
     *
     * @return bool
     *
     * @author Alaa Attya <alaa.attya@tajawal.com>
     */
    private function _objectHasFunction($object, string $function): bool
    {
        return is_object($object) && is_callable([$object, $function]);
    }

    /**
     * Map object to array
     *
     * @param mixed $object object to be transformed to array
     *
     * @return array
     *
     * @author Alaa Attya <alaa.attya@tajawal.com>
     */
    private function _mapObjectArray($object): array
    {
        $arr              = [];
        $objectAttributes = $object->map;
        foreach ($objectAttributes as $attribute) {
            $getterFuncName = 'get' . ucfirst($attribute);
            if ($this->_objectHasFunction($object, $getterFuncName)) {
                $arr[$attribute] = $object->$getterFuncName();
            }
        }

        return $arr;
    }
}