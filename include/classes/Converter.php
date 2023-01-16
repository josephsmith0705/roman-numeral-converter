<?php 

declare(strict_types=1);
final class Converter
{
    public static function run(int $number) : string
    {
        $numeral = '';

        while ($number > 0) 
        {
            $nearestNumeral = static::fetchNearestNumeral($number);
            
            $numeral .= $nearestNumeral['numeral'];
            $number  -= $nearestNumeral['number'];
        }
        return $numeral;
    }

    private static function fetchNearestNumeral(int $queryNumber) : array
    {
        foreach (static::fetchNumerals() as $numeral => $number) 
        {
            if($queryNumber >= $number) 
            {
                return [
                    'numeral' => $numeral,
                    'number'  => $number
                ];
            }
        }
    }

    private static function fetchNumerals() : array
    {
        return [
            'M' => 1000, 
            'CM' => 900, 
            'D' => 500, 
            'CD' => 400, 
            'C' => 100, 
            'XC' => 90, 
            'L' => 50, 
            'XL' => 40, 
            'X' => 10, 
            'IX' => 9, 
            'V' => 5, 
            'IV' => 4, 
            'I' => 1
        ];
    }
}