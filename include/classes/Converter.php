<?php 

declare(strict_types=1);
final class Converter
{
    public static function run(int $number) : string
    {
        $initialNumber = $number;
        $numeral       = [];

        while($number != 0)
        {
            $nearestNumeral = Converter::fetchNearestNumeral($number);

            $position = $number > 0 ? count($numeral) : -1;

            array_splice($numeral, $position, 0, $nearestNumeral['numeral']);

            $number  = $nearestNumeral['difference'];
        }

        return implode($numeral);
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
        $absNumber      = abs($queryNumber);
        $numerals       = Converter::fetchNumerals();
        $nearestNumeral = null;

        foreach($numerals as $number => $numeral)
        {
            if($nearestNumeral == null || abs($absNumber - $nearestNumeral) > abs($number - $absNumber))
            {
                $nearestNumeral = $number;
            }
        }

        $difference = ($queryNumber > 0) 
            ? $queryNumber - $nearestNumeral 
            : $queryNumber + $nearestNumeral;

        return [
            'numeral'    => $numerals[$nearestNumeral],
            'difference' => $difference
        ];
    }
}