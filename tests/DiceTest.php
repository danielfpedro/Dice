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
	public function testGeneral()
	{
		$d4 = new Dice(4);
		$d4->roll();
	}
	public function testRoll()
	{
		$sides = 4;
		$dice = new Dice($sides);
		$value = $dice->roll();

		$this->assertGreaterThanOrEqual(1, $value);
		$this->assertLessThanOrEqual($sides, $value);
	}

	public function testIsExpected()
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
	public function testIsExpectedWithArray()
	{
		$valuesExpected = [1, 2];
		$d20 = new Dice(20);
		$expected = $d20->isExpected($valuesExpected, 2);

		$lastRoll = $d20->getLastRoll();

		if (in_array($lastRoll, $valuesExpected)) {
			$this->assertTrue($expected);
		} else {
			$this->assertFalse($expected);
		}
	}
	public function testGetRollsHistory()
	{
		$value = $this->d6->roll();

		$this->assertContains($value, $this->d6->getRollsHistory());
		$this->assertCount(1, $this->d6->getRollsHistory());

		$d4 = new Dice(4);
		$val1 = $d4->roll();
		$val2 = $d4->roll();
		$val3 = $d4->roll();
		$val4 = $d4->roll();

		$history = $d4->getRollsHistory();

		$this->assertEquals($val1, $history[0]);
		$this->assertEquals($val2, $history[1]);
		$this->assertEquals($val3, $history[2]);
		$this->assertEquals($val4, $history[3]);
	}
	public function testGetLastRoll()
	{
		$value = $this->d6->roll();
		$this->assertEquals($value, $this->d6->getLastRoll());
	}

	public function testinRange()
	{
		$d6 = new Dice;
		$result = $d6->inRange(1, 6);
		$this->assertTrue($result);

		$result = $d6->inRange(1, 2);

		if ($d6->getLastRoll() <= 2) {
			$this->assertTrue($result);
		} else {
			$this->assertFalse($result);
		}
	}
}