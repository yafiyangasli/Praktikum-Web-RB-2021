<?php
	$index=0;
	for($i=1;$i<=50;$i++){
		$j=$i;
		$prime=0;
		while($j>0 && $prime<=2){
			if($i%$j==0){
				$prime++;
			}
			$j--;
		}
		if($prime==2){
			$prime_number[$index]=$i;
			$index++;
		}
	}
	echo "Bilangan Prima dari 1- 50 : [$prime_number[0]";
	for($i=1;$i<$index;$i++){
		echo ", $prime_number[$i]";
	}
	echo "]";
?>