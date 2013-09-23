<?php

/**
* PHP implementation of Rivest's Time-lock Puzzles as described 
* here: http://people.csail.mit.edu/rivest/lcs35-puzzle-description.txt
*/

// check for required libs
if(!function_exists("gmp_init")){
	exit("ERROR: Please install GMP!");
}

function GenPuzzle($t, $p, $q){
	$n = gmp_mul($p, $q);
	$phi = gmp_mul(gmp_sub($p, 1), gmp_sub($q, 1));
	return gmp_strval(gmp_powm(2, gmp_powm(2, $t, $phi), $n));
}

// runtime
$start = microtime(true);

// find primes
$min = 1000000000;
$max = 9999999999;
$rand = mt_rand($min, $max);
$p = gmp_nextprime($rand);
$q = $p;

while(gmp_cmp($p, $q) == 0){
	$rand = mt_rand($min, $max);
	$q = gmp_nextprime($rand);
}

echo "p = " . gmp_strval($p) . "\n";
echo "q = " . gmp_strval($q) . "\n";

// time slot var
$t = 1000000;
echo "t = " . $t . "\n";

echo "SOLUTION: \n";
echo GenPuzzle($t, $p, $q) . "\n";

echo "PUZZLE:\n";
$n = gmp_mul($p, $q);
echo gmp_strval($n) . ";" . $t . ";\n";

$runtime = round((microtime(true) - $start) * 1000, 3);
echo "Runtime: " . $runtime . "s\n\n";

echo "\n";
?>