<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

//require 'include/classes/Converter.php';

final class UnitTest extends TestCase
{
    //Allows testing private methods
    private function getMethod($name)
    {
        $class = new ReflectionClass('Converter');
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    /**
    * @dataProvider fetchNearestNumeralDataProvider
    */
    public function testFetchNearestNumeral(int $number, array $numeralDifference) : void
    {
        $fetchNearestNumeral = $this->getMethod('fetchNearestNumeral');
        
        $this->assertEquals(
            $fetchNearestNumeral->invokeArgs(null, [$number]),
            $numeralDifference);
    }

    private function fetchNearestNumeralDataProvider() : array
    {
        return [
            [2, [
                'numeral' => 'I',
                'number'  => 1]
            ],

            [4, [
                'numeral' => 'IV',
                'number'  => 4]
            ],

            [5, [
                'numeral' => 'V',
                'number'  => 5]
            ],

            [7, [
                'numeral' => 'V',
                'number'  => 5]
            ],

            [10, [
                'numeral' => 'X',
                'number'  => 10]
            ],
        ];
    }
}