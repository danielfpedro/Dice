<?php

namespace Test;

use Dice\Dice;
use PHPUnit_Framework_TestCase;

class DiceExepction extends PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptionConstructor()
	{
		$dice = new Dice(1);
		$dice = new Dice(0);
		$dice = new Dice(-1);
	}
	/////////////////////////////
	// Testing ::isExpected(); //
	/////////////////////////////
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptionisExpectedGreater()
	{
		$dice = new Dice(4);
		$dice->isExpected(5);
	}
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptionisExpectedZero()
	{
		$dice = new Dice(4);
		$dice->isExpected(0);
	}
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptionisExpectedChancesZero()
	{
		$dice = new Dice(4);
		$dice->isExpected(1, 0);
	}
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptionisExpectedChancesNegative()
	{
		$dice = new Dice(4);
		$dice->isExpected(1, -1);
	}
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptionisExpectedNegative()
	{
		$dice = new Dice(4);
		$dice->isExpected(-1);
	}
	///////////////////////
	// Testing inRange //
	///////////////////////
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptioninRangeMinGreater()
	{
		$dice = new Dice(4);
		$dice->inRange(5, 4);
	}
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptioninRangeMinZero()
	{
		$dice = new Dice(4);
		$dice->inRange(0, 4);
	}
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptioninRangeMinNegative()
	{
		$dice = new Dice(4);
		$dice->inRange(-1, 4);
	}
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptioninRangeMaxEqualsMin()
	{
		$dice = new Dice(4);
		$dice->inRange(3, 3);
	}
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptioninRangeMaxLessMin()
	{
		$dice = new Dice(4);
		$dice->inRange(3, 2);
	}
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptioninRangeChancesZero()
	{
		$dice = new Dice(4);
		$dice->inRange(1, 2, 0);
	}
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptioninRangeChancesNegative()
	{
		$dice = new Dice(4);
		$dice->inRange(1, 2, -1);
	}
	////////////////////////
	//Testing ::inValues //
	////////////////////////
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptionInValuesEmptyValues()
	{
		$dice = new Dice(4);
		$dice->inValues([]);
	}
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptionInValuesChancesZero()
	{
		$dice = new Dice(4);
		$dice->inValues([1], 0);
	}
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptionInValuesChancesNegative()
	{
		$dice = new Dice(4);
		$dice->inValues([1], -1);
	}
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptionInValuesValueGreater()
	{
		$dice = new Dice(4);
		$dice->inValues([1, 2, 3, 5]);
	}
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptionInValuesValueZero()
	{
		$dice = new Dice(4);
		$dice->inValues([1, 2, 3, 0], -1);
	}
	/**
	 * @expectedException	InvalidArgumentException
	 */
	public function testExceptionInValuesValueNegative()
	{
		$dice = new Dice(4);
		$dice->inValues([1, 2, 3, -1]);
	}
}