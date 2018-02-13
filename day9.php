<?php

	$strInput = fopen("day9.txt", 'r');
	//echo $strInput;
	$score = 0;
	$ignored = "";
	$garbage = "";

	$skip = false;
	while ( $char = fgetc($strInput) ):
		if( $skip === true ):
			$skip = false;
			continue;
		endif;

		if( $char !== '!' ):
			$ignored .= $char;
			continue;
		endif;

		$skip = true;
	endwhile;

	$isgarbage = false;
	$garbageCount = 0;
	for ( $x = 0; $x < strlen($ignored); $x++ ):
		if ($ignored[$x] === '>'): 
			$isgarbage = false; 
			continue;
		endif;

		if ( $isgarbage === true ):
			$garbageCount++;
			continue;
		endif;

		if ( $ignored[$x] === '<' ):
			$isgarbage = true;
			continue;
		endif;

		$garbage .= $ignored[$x];	
	endfor;

	$items = 0;

	for ( $i = 0; $i < strlen($garbage); $i++ ):
		if ( $garbage[$i] === '{' ):
			$items++;
		endif;

		if ( $garbage[$i] === '}' ):
			$score += $items;
			$items--;
		endif;
	endfor;

	echo $score;