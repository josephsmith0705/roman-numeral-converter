<?php 

declare(strict_types=1);
final class Converter
{
    public static function run(int $number) : string
    {
        $initialNumber = $number;
        $numeral       = '';

        while($number != 0)
        {
            $nearestNumeral = Converter::fetchNearestNumeral($number);

            $numeral = $number < 0 
                ? $nearestNumeral['numeral'] . $numeral
                : $numeral . $nearestNumeral['numeral'];

            $number  = $nearestNumeral['difference'];
        }

        return $numeral;
    }

    private static function fetchNumerals() : array
    {
        return [
            1 => 'I',
            5 => 'V',
            10 => 'X',
            50 => 'L',
            100 => 'C',
            500 => 'D',
            1000 => 'M'
        ];
    }

    private static function fetchNearestNumeral($queryNumber) : array
    {
        $queryNumber = abs($queryNumber);
        $numerals       = Converter::fetchNumerals();
        $nearestNumeral = null;

        foreach($numerals as $number => $numeral)
        {
            if($nearestNumeral == null || abs($queryNumber - $nearestNumeral) > abs($number - $queryNumber))
            {
                $nearestNumeral = $number;
            }
        }

        return [
            'numeral'    => $numerals[$nearestNumeral],
            'difference' => $queryNumber - $nearestNumeral
        ];
    }
}