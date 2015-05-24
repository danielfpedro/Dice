<?php 

namespace Dice;

use InvalidArgumentException;

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
	protected $rollsHistory = [];

	/**
	 * Método construtor
	 * @param number $sides Diz quantos lados o dado construído irá possuir
	 */
	public function __construct($sides = 6)
	{	
		if ($sides < 2) {
			throw new InvalidArgumentException("Sides have to be greater than 2. Given ({$sides})");
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
		$this->rollsHistory[] = $result;
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
			throw new InvalidArgumentException("Can't expect a value greater than Dice sides. Dice sides is ({$this->sides}) and your are expecting ({$expected})");			
		}
		for ($i = 0; $i < $chances; $i++) {
			if ($this->roll() == $expected) {
				return true;
			}
		}		
		return false;
	}
	/**
	 * Verifica se o resultado da jogada de um dado está dentro do range
	 * informado
	 * @param  integer  $min     	Valor mínimo do range
	 * @param  integer  $max     	Valor máximo do range
	 * @param  integer 	$chances 	Quantas vezes o dado será jogado
	 * @return boolean
	 */
	public function hasRange($min, $max, $chances = 1)
	{
		$this->_validateChances($chances);

		if ($min <= 0) {
			throw new InvalidArgumentException("The min value can't be less than 1. Given (".$min.")", 1);	
		}
		if ($min > $this->sides) {
			throw new InvalidArgumentException("The min value can't be greater than dice sides (".$this->sides."). Given (".$min.")", 1);	
		}

		if ($max > $this->sides) {
			throw new InvalidArgumentException("The max value can't be greater than dice sides (".$this->sides."). Given (".$max.")", 1);	
		}
		if ($max <= $min) {
			throw new InvalidArgumentException("The max value can't be less or equals than min value (".$min."). Given (".$max.") ", 1);	
		}

		for ($i = 0; $i < $chances; $i++) {
			$value = $this->roll();
			if ($value >= $min && $value <= $max) {
				return true;
			}
		}		
		return false;
	}
	protected function _validateChances($chances)
	{
		if ($chances < 1) {
			throw new InvalidArgumentException("Chances have to be greater than 0. Given({$chances})");
		}
	}
	/**
	 * Verifica se o resultado de uma jogada de dado
	 * é igual ao menos a um dos valores informados
	 * @param  array   $values  Valores a serem comparados
	 * @param  integer $chances Quantas vezes o dado será jogado
	 * @return boolen
	 */
	public function inValues(array $values, $chances = 1)
	{
		if (!$values) {
			throw new InvalidArgumentException("Values can't be empty");
		}
		$this->_validateInValues($values);
		$this->_validateChances($chances);

		for ($i = 0; $i < $chances; $i++) {
			$value = $this->roll();
			if (in_array($value, $values)) {
				return true;
			}
		}		
		return false;
	}
	protected function _validateInValues($values)
	{
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
			throw new InvalidArgumentException("One or more values from values can't be less than 1, they are: (".implode(', ', $lessThanMinValues).")");	
		}
		if ($greaterThanMaxValues) {
			throw new InvalidArgumentException("On or more values from values can't be greater than ".$this->sides.", they are: (".implode(', ', $greaterThanMaxValues).")");
		}
	}
	/**
	 * Mostra o hitórico dos valores das jogadas de dado
	 * @return array
	 */
	public function getRollsHistory()
	{
		return $this->rollsHistory;
	}
	/**
	 * Mostra o valor da última jogada de dado
	 * @return integer
	 */
	public function getLastRoll()
	{
		return end($this->getRollsHistory());
	}
}

$d6 = new Dice(2);
$d6->hasRange(1, 2);