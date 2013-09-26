<?php

// check for required libs
if(!function_exists("gmp_init")){
  exit("ERROR: Please install GMP!");
}

function findPrimes($numprimes, $min, $max){

	$rand = mt_rand($min, $max);
	$p = gmp_nextprime($rand);

	for($i = 0; $i < $numprimes; $i++){
		$p = mt_rand($min, $max);
		$p = gmp_nextprime($p);
		echo gmp_strval($p)."\n";
	}
}

// save start time
$start = microtime(true);

// set parameter
$numprimes = 1000;
$min = 1000000000;
$max = 9999999999;

findPrimes($numprimes, $min, $max);

echo "Primes (".$numprimes.") found in: " . round((microtime(true) - $start), 3) . " s\n";

?>