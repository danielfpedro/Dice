# Dice
Lib to simulate operations with a dice

### Instalation
`composer require danielfpedro\dice`

### Instanciating

	// Creating a dice with 6 sides
	$d6 = new Dice;
	
You can assign how much sides the dice will have sice this is greater than 1
	$d4 = new Dice(4);
	
Roll a dice and getting the history

	$d4 = new Dice(4);
	$d4->roll(); //Output: 2
	$d4->roll(); //Output: 1
	$d4->getLastRoll();//Output: 1
	$d4->getHistory();//Output: [2, 1]
	


