<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require 'include/classes/Converter.php';

final class ConverterTest extends TestCase
{
    public function testValidNumeral(): void
    {
        $this->assertEquals(
            Converter::run(1),
            'I');
    }
}