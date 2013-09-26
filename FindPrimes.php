<?php

// check for required libs
if(!function_exists("gmp_init")){
  exit("ERROR: Please install GMP!");
}

/**
* findPrimes() finds n primes in range [min,max] 
* @param $n number of primes to find
* @param $min lower limit of range
* @param $max upper limit of range
*/
function findPrimes($n, $min, $max){
	for($i = 0; $i < $n; $i++){
		$p = mt_rand($min, $max);
		$p = gmp_nextprime($p);
		echo gmp_strval($p)."\n";
	}
}

// set parameter
$n = 1000;
$min = 1000000000;
$max = 9999999999;

// save start time
$start = microtime(true);

// run it
findPrimes($n, $min, $max);

// runtime
echo "Primes (".$n.") found in: " . round((microtime(true) - $start), 3) . " s\n";

?>