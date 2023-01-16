<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require 'include/classes/Converter.php';

final class ConverterTest extends TestCase
{
    /**
    * @dataProvider singleNumeralDataProvider
    */
    public function testSingleNumerals(int $number, string $numeral) : void
    {
        $this->assertEquals(
            Converter::run($number),
            $numeral);
    }

    /**
    * @dataProvider multiNumeralDataProvider
    */
    public function testMultiNumerals(int $number, string $numeral) : void
    {
        $this->assertEquals(
            Converter::run($number),
            $numeral);
    }

    /**
    * @dataProvider largeNumeralDataProvider
    */
    public function testLargeNumerals(int $number, string $numeral) : void
    {
        $this->assertEquals(
            Converter::run($number),
            $numeral);
    }

    private function singleNumeralDataProvider() : array
    {
        return [
            [1,   'I'],
            [5,   'V'],
            [10,  'X'],
            [50,  'L'],
            [100, 'C']
        ];
    }

    private function multiNumeralDataProvider() : array
    {
        return [
            [2,  'II'],
            [4,  'IV'],
            [7,  'VII'],
            [14, 'XIV'],
            [20, 'XX']
        ];
    }

    private function largeNumeralDataProvider() : array
    {
        return [
            [623,  'DCXXIII'],
            [999,  'CMXCIX'],
            [1861, 'MDCCCLXI'],
            [2023, 'MMXXIII'],
            [9001, 'MMMMMMMMMI']
        ];
    }
}