# Dice
Lib to simulate operations with a dice

### Instalation
`composer require danielfpedro\dice`

### Lets roll the dice
	
Roll a dice and getting the history

	$d4 = new Dice(4); // If you don't assign any value the default will be 6
	$d4->roll(); //Output: 2
	$d4->roll(); //Output: 1
	$d4->getLastRoll();//Output: 1
	$d4->getHistory();//Output: [2, 1]
	
### ::isExpected
Will roll a dice many times as you assign and return a boolean value if one of this times the dice hit what you are expecting.
	
	// Will roll a dice once and return true if the result of tihs roll be 2
	// Otherwise will return false
	$d4->isExptected(2)
	
	// Same thing but will roll the dice 5 times
	$d4->isExpected(2, 5)
	


