<?php
namespace Test;

use Dice\Dice;
use PHPUnit_Framework_TestCase;

class DiceTest extends PHPUnit_Framework_TestCase
{
	protected $d6;

	public function __construct()
	{
		$this->d6 = new Dice;
	}
	public function testRoll()
	{
		$sides = 4;
		$dice = new Dice($sides);
		$value = $dice->roll();

		$this->assertGreaterThanOrEqual(1, $value);
		$this->assertLessThanOrEqual($sides, $value);
	}

	public function testIsExepted()
	{
		$valueExpected = 1;
		$expected = $this->d6->isExpected($valueExpected);

		$lastRoll = $this->d6->getLastRoll();

		if ($lastRoll == $valueExpected) {
			$this->assertTrue($expected);
		} else {
			$this->assertFalse($expected);
		}
	}
	public function testGetLastRolls()
	{
		$value = $this->d6->roll();

		$this->assertContains($value, $this->d6->getLastRolls());
		$this->assertCount(1, $this->d6->getLastRolls());
	}
	public function testGetLastRoll()
	{
		$value = $this->d6->roll();
		$this->assertEquals($value, $this->d6->getLastRoll());
	}
}