# Dice
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.txt)

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
	// Roll the dice once and return true if the result is 2
	$d4->isExptected(2);
You can pass a second argument to assign how many times the dice will roll to try match the value

	$d4->isExpected(2, 5);

### ::inValues
	// Roll the dice once and return true if the result is 1 or 3
	$d4->inValues([1, 3]);
You can pass a second argument to assign how many times the dice will roll to try match the values

	$d4->inValues([1, 3], 5);
	
### ::inRange
	// Roll the dice once and return true if result is under the range 1@3
	$d4->inRange([1, 3]);
You can pass a second argument to assign how many times the dice will roll to try match the range

	$d4->inRange([1, 3], 5);
	


