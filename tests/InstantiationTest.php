<?php

namespace Test;

use Zman\Zman;

class InstantiationTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_can_be_newed_up()
    {
        $zman = new Zman('first day of November 2016');
        $this->assertInstanceOf(Zman::class, $zman);
    }

    /** @test */
    public function it_can_instantiated_by_parsing_a_string()
    {
        $zman = Zman::parse('first day of November 2016');
        $this->assertInstanceOf(Zman::class, $zman);
    }

    /** @test */
    public function it_can_be_instantiated_with_the_current_moment()
    {
        $zman = Zman::now();
        $this->assertInstanceOf(Zman::class, $zman);
        $this->assertIsString($zman->toFormattedDateString());
        $this->assertIsString($zman->toFormattedJewishHebrewDateString());
    }

    /** @test */
    public function it_can_be_instantiated_manually_with_an_english_date()
    {
        $zman = Zman::createFromDate(2016, 2, 2);

        $this->assertInstanceOf(Zman::class, $zman);
        $this->assertEquals('Feb 2, 2016', $zman->toFormattedDateString());
    }

    /** @test */
    public function it_can_be_instantiated_manually_with_a_jewish_date()
    {
        $zman = Zman::createFromJewishDate(5776, 5, 23);

        $this->assertInstanceOf(Zman::class, $zman);
        $this->assertEquals('Feb 2, 2016', $zman->toFormattedDateString());
        $this->assertEquals('כ״ג שבט, תשע״ו', $zman->toFormattedJewishHebrewDateString());

        $zman = Zman::createFromJewishDate(3761, 4, 18);

        $this->assertInstanceOf(Zman::class, $zman);
        $this->assertEquals('Jan 1, 0001', $zman->toFormattedDateString());
        $this->assertEquals('י״ח טבת, תשס״א', $zman->toFormattedJewishHebrewDateString());
    }
}
