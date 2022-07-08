<?php

namespace Test;

use App\Dojo;
use PHPUnit\Framework\TestCase;

class DojoTest extends TestCase
{
    /**
     * @var Dojo
     */
    private $dojo;

    protected function setUp()
    {
        parent::setUp();
        $this->dojo = new Dojo();
    }

    public function test_noMeasurementsAreGiven_ReturnsZero()
    {
        $this->assertEquals(0, $this->dojo->getClosestTemperatureToZero(0, ''));
    }

    public function test_singleMeasurementIsGiven_ReturnsTemperature()
    {
        $this->assertEquals(15, $this->dojo->getClosestTemperatureToZero(1, '15'));
    }

    public function test_twoPositiveMeasurementsAreGiven_ReturnsLowerTemperature()
    {
        $this->assertEquals(2, $this->dojo->getClosestTemperatureToZero(2, '7 2'));
    }

    public function test_twoNegativeMeasurementsAreGiven_ReturnsHigherTemperature()
    {
        $this->assertEquals(-2, $this->dojo->getClosestTemperatureToZero(2, '-7 -2'));
    }

    public function test_temperaturesWithSameAbsoluteValueGiven_ReturnsPositiveTemperature()
    {
        $this->assertEquals(-4, $this->dojo->getClosestTemperatureToZero(10, '32 123 -4 12 9 -7 -8 5 5 -4'));
    }

    public function test_complexTestCaseGiven_ReturnsCorrectResult()
    {
        $this->assertEquals(2, $this->dojo->getClosestTemperatureToZero(10, '-5 -4 -2 12 -40 4 2 18 11 5'));
    }
}
