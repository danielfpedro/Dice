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
Will roll the dice once and test if the result match with the expected value.

	$d4->isExpected(2);
	//You can pass a second argument if you want the dice be rolled more than once
	$d4->isExpected(2, 5);
	//The first argument could be an array of values expected
	$d4->isExpected([1, 2])
	//You still can pass a second argument to assign how many times the dice will be rolled
	$d4->isExpected([1, 2], 5)
	
### ::inRange

	// Roll the dice once and return true if result is under the range 1@3
	$d4->inRange([1, 3]);
You can pass a second argument to assign how many times the dice will roll to try match the range

	$d4->inRange([1, 3], 5);
	


