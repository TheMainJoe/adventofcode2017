<?php
	//$input = array(0,5,10,0,11,14,13,4,11,8,8,7,1,4,12,11);
	$strInput = file_get_contents("day6.txt");// "0	5	10	0	11	14	13	4	11	8	8	7	1	4	12	11";
	//Convert string into an array, expected string will be tab separated
	$input = explode("\t",$strInput);
	//number of loops to get to the same value array
	$loops = 0;
	//print_r($input); exit;
	//Place the arrays in an array to compare later
	$res = array();

	while (1):
		// Count number of loops for the final result
		$loops++;
		//find the highest value
		$high = MAX($input);
		//get the position of the highest value
		$pos = array_search($high,$input);

		$num = 1;
		//make the value at the position 0 to be incremented
		$input[$pos] = 0;

		while ( $high > 0 ):
			$position = $pos + $num++;
			if( $position >= count($input) ):
				$position = $position % count($input);
			endif;

			$input[$position]++;
			$high--;
		endwhile;

		if( in_array( $input, $res ) ):
			//Output the number of loops and end the program
			echo $loops;
			break;
		endif;
		//Add the arrays into the result array.
		array_push($res, $input);

	endwhile;