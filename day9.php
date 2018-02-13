<?php

	$strInput = fopen("day9.txt", 'r');
	//echo $strInput;
	$score = 0;
	$ignored = "";
	$garbage = "";
	//Mark as character to skip 
	$skip = false;
	while ( $char = fgetc($strInput) ):
		//Check if it is part of the characters to skip
		if( $skip === true ):
			$skip = false;
			continue;
		endif;
		//Add character to ignore list if its not the one we skip
		if( $char !== '!' ):
			$ignored .= $char;
			continue;
		endif;

		$skip = true;
	endwhile;

	$isgarbage = false;
	$garbageCount = 0;
	for ( $x = 0; $x < strlen($ignored); $x++ ):
		//Check ignore list for closing garbage brackets
		if ($ignored[$x] === '>'): 
			$isgarbage = false; 
			continue;
		endif;
		//Count number of garbage characters
		if ( $isgarbage === true ):
			$garbageCount++;
			continue;
		endif;
		//Check list for opening garbage brackets
		if ( $ignored[$x] === '<' ):
			$isgarbage = true;
			continue;
		endif;
		//Add valid non-garbage brackets to the string
		$garbage .= $ignored[$x];	
	endfor;
	//Groups
	$items = 0;

	for ( $i = 0; $i < strlen($garbage); $i++ ):
		//Check garbage for start of group
		if ( $garbage[$i] === '{' ):
			$items++;
		endif;
		//check garbage for end of group and add score
		if ( $garbage[$i] === '}' ):
			$score += $items;
			$items--;
		endif;
	endfor;
	//Display final score
	echo $score;