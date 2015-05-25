<?php

namespace Dice;

use InvalidArgumentException;

/**
* 			
*/
class ArgumentValidation
{
	static function expected($value, $diceSides)
	{
		if ($value < 1 || $value > $diceSides) {
			throw new InvalidArgumentException(sprintf("The value can't be less than one or greater than dice sides '%i'. Given (%i) ", $diceSides, $value));
		}
	}
	static function chances($chances)
	{
		if ($chances < 1) {
			throw new InvalidArgumentException("Chances can't be less than 1. Given({$chances})");
		}
	}
	static function sides($sides)
	{
		if ($sides < 2) {
			throw new InvalidArgumentException("Sides have to be greater than 2. Given ({$sides})");
		}
	}
	static function range($min, $max)
	{
		if ($max <= $min) {
			throw new InvalidArgumentException("Max value({$max}) can't be equals or less than min value({$min})");			
		}
	}
	static function hasValues(array $values)
	{
		if (!$values) {
			throw new InvalidArgumentException("Values can't be empty");
		}
	}
}