<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require 'include/classes/Converter.php';

final class ConverterTest extends TestCase
{
    /**
    * @dataProvider validSingleNumeralDataProvider
    */
    public function testValidSingleNumerals(int $number, string $numeral) : void
    {
        $this->assertEquals(
            Converter::run($number),
            $numeral);
    }

    /**
    * @dataProvider validMultiNumeralDataProvider
    */
    public function testValidMultiNumerals(int $number, string $numeral) : void
    {
        $this->assertEquals(
            Converter::run($number),
            $numeral);
    }

    /**
    * @dataProvider validLargeNumerals
    */
    public function testValidLargeNumerals(int $number, string $numeral) : void
    {
        $this->assertEquals(
            Converter::run($number),
            $numeral);
    }

    public function validSingleNumeralDataProvider() : array
    {
        return [
            [1,  'I'],
            [5,  'V'],
            [10, 'X'],
        ];
    }

    public function validMultiNumeralDataProvider() : array
    {
        return [
            [2,  'II'],
            [4,  'IV'],
            [14, 'XIV'],
        ];
    }

    public function validLargeNumerals() : array
    {
        return [
            [2023,  'MMXXIII'],
            [9001,  'MMMMMMMMMI'],
            [1861 , 'MDCCCLXI'],
        ];
    }
}