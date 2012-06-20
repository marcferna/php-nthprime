<?php
//Check if the arguments are correct
if(count($argv)!= 2 || !is_numeric($argv[1])){
	echo "Invalid usage\n";
	exit();
}
$n = $argv[1];

//Initalize the primes array already with the 2 in it,
//and separate the special case where the 1st prime number is requested
$primes = array(2);
if($n == count($primes)){
	printResult($n, $primes[$n-1]);
	exit();
}

//Loop through all the odd numbers until we find the nth prime
for($primeCandidate=3; ;$primeCandidate = $primeCandidate+2 ){
	if(isPrime($primeCandidate, $primes)){
		$primes[] = $primeCandidate;
	}
	if(count($primes) == $n) {
		printResult($n,$primeCandidate);
		exit();
	}

}

function isPrime($primeCandidate, $primes){
	$i = 0;
	//Loop through the already prime numbers that are
	//smaller than the square root of the candidate
	//to check if they are a factor of the candidate or not
	do{
		$prime = $primes[$i];
		if($primeCandidate % $prime == 0){
			return false;
		}
		$i++;
	}while($prime < sqrt($primeCandidate));
	return true;
}

function printResult($n, $p){
	echo "The {$n}th prime is: $p\n";
}
?>
