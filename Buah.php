<?php
/**
 * 
 */
class Buah
{
  
  var $namaBuah1;
  var $namaBuah2;
  var $namaBuah3;

  private ?int $harga1;
  private ?int $harga2;
  private ?int $harga3;

  public function harga1 ($harga1){
  	$this->harga1 = $harga1;
  }

  public function harga2 ($harga2){
  	$this->harga2 = $harga2;
  }

  public function harga3 ($harga3){
  	$this->harga3 = $harga3;
  }

  public function tampil (){
  	echo '<p style="text-align: center;">'.$this->namaBuah1.' '.$this->harga1.'/Kg<br>'.$this->namaBuah2.' '.$this->harga2.'/Kg<br>'.$this->namaBuah3.' '.$this->harga3.'/Kg</p>';
  }
}
?>