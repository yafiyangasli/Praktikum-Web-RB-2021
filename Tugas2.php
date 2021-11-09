<?php
	$data=["lanirne", "aduh", "qifuat", "toda", "anevi", "samid", "kifuat", "valhein", "arthur", "zanis"];
	echo "Data awal : [$data[0]";
	for($i=1;$i<10;$i++){
		echo ", $data[$i]";
	}
	echo "]<br>";
    for($i=1;$i<10;$i++){
        for($j=0;$j<10-$i;$j++)
            if($data[$j]>$data[$j+1]){
                $tmp = $data[$j];
                $data[$j] = $data[$j+1];
                $data[$j+1] = $tmp;
            }
    }
	echo "Data setelah di urutkan : [$data[0]";
	for($i=1;$i<10;$i++){
		echo ", $data[$i]";
	}
	echo "]";
?>