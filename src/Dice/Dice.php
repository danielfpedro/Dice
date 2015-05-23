<?php 

namespace Dice;

use Exception;

/**
 * 
 */
class Dice
{
	/**
	 * Dice side
	 * @var number
	 */
	protected $sides;
	protected $lastRolls = [];

	/**
	 * Método construtor
	 * @param number $sides Diz quantos lados o dado construído irá possuir
	 */
	public function __construct($sides = 6)
	{	
		if ($sides < 2) {
			throw new Exception("Expection Dice sides value greater than 2, given ({$sides})");
		}
		$this->sides = $sides;
	}
	/**
	 * Roll the dice
	 * @return number Valor numérico do resultado do dado jogado
	 */
	public function roll()
	{
		$result = rand(1, $this->sides);
		$this->lastRolls[] = $result;
		return $result;
	}
	/**
	 * Verifica se o resultado esperado foi obtido
	 * @param  number  $expected Resultado esperado
	 * @return boolean           Resultado teve êxito ou não
	 */
	public function isExpected($expected, $chances = 1)
	{
		if ($expected > $this->sides) {
			throw new Exception("Can't expect a value greater than Dice sides. Dice sides is ({$this->sides}) and your are expecting ({$expected})", 1);			
		}
		for ($i = 0; $i < $chances; $i++) {
			if ($this->roll() == $expected) {
				return true;
			}
		}		
		return false;
	}
	public function hasRange($min, $max, $chances = 1)
	{
		if ($chances < 1) {
			throw new Exception("Your chances have to be at least 1. Given ({$chances})", 1);
		}
		if ($min <= 0) {
			throw new Exception("The min value can't be less than 1. Given (".$min.")", 1);	
		}
		if ($min > $this->sides) {
			throw new Exception("The min value can't be greater than dice sides (".$this->sides."). Given (".$min.")", 1);	
		}

		if ($max > $this->sides) {
			throw new Exception("The max value can't be greater than dice sides (".$this->sides."). Given (".$max.")", 1);	
		}
		if ($max <= $min) {
			throw new Exception("The max value can't be less or equals than min value (".$min."). Given (".$max.") ", 1);	
		}

		for ($i = 0; $i < $chances; $i++) {
			$value = $this->roll();
			if ($value >= $min && $value <= $max) {
				return true;
			}
		}		
		return false;
	}
	public function inValues(array $values, $chances = 1)
	{
		if (!$values) {
			throw new Exception("The values can't be empty", 1);
		}
		$lessThanMinValues = [];
		$greaterThanMaxValues = [];
		foreach ($values as $value) {
			if ($value < 1) {
				$lessThanMinValues[] = $value;
			}
			if ($value > $this->sides) {
				$greaterThanMaxValues[] = $value;
			}
		}
		if ($lessThanMinValues) {
			throw new Exception("On or more values from values can't be less than 1, they are: (".implode(', ', $lessThanMinValues).")", 1);	
		}
		if ($greaterThanMaxValues) {
			throw new Exception("On or more values from values can't be greater than ".$this->sides.", they are: (".implode(', ', $greaterThanMaxValues).")", 1);	
		}
		if ($chances < 1) {
			throw new Exception("Your chances have to be at least 1. Given ({$chances})", 1);
		}
		for ($i = 0; $i < $chances; $i++) {
			$value = $this->roll();
			if (in_array($value, $values)) {
				return true;
			}
		}		
		return false;
	}
	public function getLastRolls()
	{
		return $this->lastRolls;
	}
	public function getLastRoll()
	{
		return $this->getLastRolls()[0];
	}
}

$dice = new Dice;
echo $dice->hasRange(1, 6, 1);