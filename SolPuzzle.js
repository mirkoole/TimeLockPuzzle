/**
* JavaScript implementation of Rivest's Time-lock Puzzles as described 
* here: http://people.csail.mit.edu/rivest/lcs35-puzzle-description.txt
*/

function SolPuzzle(t, n){
	// bigInt  str2bigInt(s,b,n,m)    //return a bigInt for number represented in string s in base b with at least n bits and m array elements
	var n 	= str2bigInt(n, 10, 0);
	var s 	= int2bigInt(2, 10, 0);
	var two = int2bigInt(2, 10, 0);
	for(i = 0; i < t; i++){
		s = powMod(s, two, n);
	}
	return bigInt2str(s,10);
}

function bodyLoad(){
	// reset form
	document.getElementById('Result').innerHTML = ' ';

	// input
	var t = 1000000;
	var n = '89429066299370184839';

	// runtime
	var start_time = new Date().getTime();

	// solve puzzle
	var result = SolPuzzle(t, n);

	// runtime
	var runtime = (new Date().getTime() - start_time) / 1000;
	console.log('Runtime: ', runtime, ' s');
	document.getElementById('Runtime').innerHTML = runtime + ' s';

	// print result
	console.log('Result: ', result);
	document.getElementById('Result').innerHTML = result;
}

document.addEventListener('DOMContentLoaded', bodyLoad, false);