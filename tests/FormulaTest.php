<?php
use PHPUnit\Framework\TestCase;
use Shimoning\Formula\Formula;

class FormulaTest extends TestCase
{
    public function testNumberOnly()
    {
        $this->assertEquals(
            1000,
            Formula::calculate('1000')
        );
    }

    public function testNegativeNumberOnly()
    {
        $this->assertEquals(
            -1000,
            Formula::calculate('-1000')
        );
    }

    public function testNegativeFloatNumberOnly()
    {
        $this->assertEquals(
            -1000.12,
            Formula::calculate('-1000.12')
        );
    }

    public function testAddition()
    {
        $this->assertEquals(
            120,
            Formula::calculate('100 + 20')
        );
    }

    public function testSubtraction()
    {
        $this->assertEquals(
            -200,
            Formula::calculate('100 - 300')
        );
    }

    public function testAddNegative()
    {
        $this->assertEquals(
            -200,
            Formula::calculate('100 + -300')
        );
    }

    public function testMultiplication()
    {
        $this->assertEquals(
            -615,
            Formula::calculate('-123 * 5')
        );
    }

    public function testDivision()
    {
        $this->assertEquals(
            0.8,
            Formula::calculate('100 / 125')
        );
    }

    public function testAllIn()
    {
        $this->assertEquals(
            270,
            Formula::calculate('10 * 20 + 300 / 4 - 5')
        );
    }

    public function testBlanket()
    {
        $this->assertEquals(
            -3200,
            Formula::calculate('10 * (20 + 300) / (4 - 5)')
        );
    }

    public function testSurplus()
    {
        $this->assertEquals(
            1,
            Formula::calculate('100 % 3')
        );
    }
}
