<?php 

namespace Dice;

//require '../../vendor/autoload.php';

use Dice\ArgumentValidation;

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
		ArgumentValidation::sides($sides);
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
		if (is_array($expected)) {
			return $this->_inValues($expected, $chances);
		}
		
		ArgumentValidation::expected($expected, $this->sides);
		ArgumentValidation::chances($chances);

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
	public function inRange($min, $max, $chances = 1)
	{
		ArgumentValidation::expected($min, $this->sides);
		ArgumentValidation::expected($max, $this->sides);
		ArgumentValidation::range($min, $max, $this->sides);

		ArgumentValidation::chances($chances);

		for ($i = 0; $i < $chances; $i++) {
			$value = $this->roll();
			if ($value >= $min && $value <= $max) {
				return true;
			}
		}		
		return false;
	}
	/**
	 * Verifica se o resultado de uma jogada de dado
	 * é igual ao menos a um dos valores informados
	 * @param  array   $values  Valores a serem comparados
	 * @param  integer $chances Quantas vezes o dado será jogado
	 * @return boolen
	 */
	protected function _inValues(array $values, $chances = 1)
	{
		ArgumentValidation::hasValues($values);

		foreach ($values as $value) {
			ArgumentValidation::expected($value, $this->sides);
		}
		ArgumentValidation::chances($chances);

		for ($i = 0; $i < $chances; $i++) {
			$value = $this->roll();
			if (in_array($value, $values)) {
				return true;
			}
		}		
		return false;
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

// $dice = new Dice(0);