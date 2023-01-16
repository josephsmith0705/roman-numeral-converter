<?php 

declare(strict_types=1);
final class Converter
{
    public static function run(int $number) : string
    {
        $roughNumeral = Converter::getRoughNumeral($number);
        
        $numeral = Converter::cleanNumeral($roughNumeral);

        return implode($numeral);
    }

    //return the numeral BEFORE checking if over 3 of the same numerals are repeated
    private static function getRoughNumeral(int $number) : array
    {
        while($number != 0)
        {
            $nearestNumeral = Converter::fetchNearestNumeral($number);

            $numeral[] = $nearestNumeral['numeral'];

            $number  = $nearestNumeral['difference'];
        }

        return $numeral;
    }

    private static function cleanNumeral(array $numeral) : array
    {
        foreach($numeral AS $numeralKey => $numeralCharacter)
        {
            $currentCharacter = $numeralCharacter;
            $characterCount = 0;

            foreach($numeral as $character)
            {
                if($character == $currentCharacter)
                {
                    $characterCount++;
                }
                else
                {
                    $characterCount = 0;
                }
            }

            if($characterCount > 3)
            {
                $numeral[$numeralKey] = 1; 
            }
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
        foreach(Converter::fetchNumerals() as $number => $numeral)
        {
            if($queryNumber >= $number)
            {
                $nearestNumeralInt    = $number;
                $nearestNumeralString = $numeral;
            }
        }

        return [
            'numeral'    => $nearestNumeralString,
            'difference' => $queryNumber - $nearestNumeralInt
        ];
    }
}