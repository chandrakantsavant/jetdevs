<?php
// Remove the M element recursively from the circle
/*
Task:
Suppose N people line up in a circle. Counting from person 1 to person M, remove the Mth
person from the circle. Then the next person as 1, counting from 1 to M again, and remove the
Mth person. Until there is only one person left. Using PHP code to get the final one person’s
index of the original circle.
*/



	// Input Vars
	$n = 30;
	$m = 4;
	echo "The Final one is ", removeMELement($n, $m);

// Recursive function to remove Mth element and get the last element
function removeMELement($n, $m)
{
  if ($n == 1) {
  	return $n;
  }	else {

		return (removeMELement($n - 1, $m) + $m - 1) % $n + 1;
  }
}