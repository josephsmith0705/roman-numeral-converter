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
    * @dataProvider getRoughNumeralDataProvider
    */
    public function testGetRoughNumeral(int $number, array $roughNumeral) : void
    {
        $getRoughNumeral = $this->getMethod('getRoughNumeral');
        
        $this->assertEquals(
            $getRoughNumeral->invokeArgs(null, [$number]),
            $roughNumeral);
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

    /**
    * @dataProvider cleanNumeralDataProvider
    */
    public function testCleanNumeral(array $roughNumeral, array $cleanedNumeral) : void
    {
        $cleanNumeral = $this->getMethod('cleanNumeral');

        $this->assertEquals(
            $cleanNumeral->invokeArgs(null, [$roughNumeral]),
            $cleanedNumeral);
    }

    private function getRoughNumeralDataProvider() : array
    {
        return [
            [2,  ['I', 'I']],
            [4,  ['I', 'I', 'I', 'I']],
            [5,  ['V']],
            [9,  ['V', 'I', 'I', 'I', 'I']],
            [13, ['X', 'I', 'I', 'I']]
        ];
    }

    private function fetchNearestNumeralDataProvider() : array
    {
        return [
            [2, [
                'numeral' => 'I',
                'difference' => 1]
            ],

            [4, [
                'numeral' => 'I',
                'difference' => 3]
            ],

            [5, [
                'numeral' => 'V',
                'difference' => 0]
            ],

            [7, [
                'numeral' => 'V',
                'difference' => 2]
            ],

            [10, [
                'numeral' => 'X',
                'difference' => 0]
            ],
        ];
    }

    private function cleanNumeralDataProvider() : array
    {
        return [
            [['I', 'I', 'I', 'I'],           ['I', 'V']],
            [['X', 'I', 'I', 'I', 'I'],      ['X', 'I', 'V']],
            [['X', 'V', 'I', 'I', 'I', 'I'], ['X', 'V', 'I', 'V']],
            [['I', 'I', 'I'],                ['I', 'I', 'I']],
            [['V', 'I', 'I', 'I'],           ['V', 'I', 'I', 'I']],
        ];
    }
}