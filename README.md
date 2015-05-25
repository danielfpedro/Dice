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

	// Supose the dice roll result is 2
	$d4->isExpected(2); // Output: true
	
	//You can pass a second argument if you want the dice be rolled more than once
	// Supose the result of the 5 rolls is: 1, 1, 4, 2, 1
	$d4->isExpected(2, 5); // Output: true
	
	//The first argument could be an array of values expected
	// Supose the dice roll result is 3
	$d4->isExpected([1, 2]) // Output: false
	
	//You still can pass a second argument to assign how many times the dice will be rolled
	// Dice roll results: 4, 3, 4, 4, 3
	$d4->isExpected([1, 2], 5)// Output: false
	
### ::inRange

	// Roll the dice once and return true if result is under the range 1@3
	$d4->inRange([1, 3]);
You can pass a second argument to assign how many times the dice will roll to try match the range

	$d4->inRange([1, 3], 5);
	


