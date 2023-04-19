<?php

	$une= (string) date("Y-m-05");
	
	$annee= (string) date("Y")-3;
	
	
	
	$mois=  date("m");
	if(date("m")<10)
	{
		$mois+=5;
	}
	
	$jour=(string) date("d")-1;
	
	echo $une." ";
	
	$new = $annee. "-".$mois ."-".$jour;
	echo $new;
	
	
?>