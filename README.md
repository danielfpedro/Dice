# Dice
Lib to simulate operations with a dice

### Instalation
`composer require danielfpedro\dice`

### Lets roll the dice
	
Rolling the dice and getting the history
	
	use Dice\Dice;
	
	$d4 = new Dice(4); // If you don't assign any value the default will be 6
	$d4->roll(); //Output: 2
	$d4->roll(); //Output: 1
	$d4->getLastRoll(); //Output: 1
	$d4->getRollsHistory(); //Output: [2, 1]
	
### ::isExpected
	// Roll the dice 1 time and return true if the result is 2
	$d4->isExptected(2);
	// Roll the dice 5 times and return true if one of this times the result is 2
	$d4->isExpected(2, 5);

### ::inValues
	$d4->inValues([1, 3]);
	$d4->inValues([1, 3], 5);
	
### ::hasRange
	$d4->hasRange([1, 3]);
	$d4->hasRange([1, 3], 5);
	


