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
	/**
	 * @return array Últimos números tirados
	 */
	public function getLastRolls()
	{
		return $this->lastRolls;
	}
	/**
	 * @return number Último Número tirado
	 */
	public function getLastRoll()
	{
		return $this->getLastRolls()[0];
	}
}