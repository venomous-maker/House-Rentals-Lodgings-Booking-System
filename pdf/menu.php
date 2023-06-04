<?php
include 'includes/db.php';
require('fpdf182/fpdf.php');

/**
* HEADER
*/
class PDF extends FPDF
{
	function Header(){
		//dummy cell to put logo
		$this -> Cell(12);
		//Seku logo
		$this ->Image('images/seku_logo.png',78,10);
		$this ->Image('images/Watermark.jpg',10,90,189);
	}

	function Footer(){
		$this -> SetFont('Arial','B',10);
		// Go to 1.5cm from bottom
		$this -> SetY(-15);
		$this -> Cell(0,5,'Ellins Hostel And Accommodation, copyright 2022;',0,1,'C');
		$this -> Cell(0,5,'Page '.$this -> PageNo("{pages}"),0,0,'C');
	}
}

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219 - (10*2) = 199mm

$pdf = new PDF('P','mm','A4'); //creating an FPDF Object
$pdf ->AddPage(); //Adds a page

//Menu heading
$pdf ->SetFont('Arial','B',30);
$pdf ->Ln(55);
$pdf ->Cell(189,10,"ELLINS HOSTEL AND ACCOMMODATION",0,1,'C');
$pdf ->Cell(189,10,'HOUSES LIST',0,1,'C');
$pdf ->Image('images/Watermark.jpg',10,100,189);

// MENU
// GROUND FLOOR
if(!$connect){
	die('Database connection failed!!');
}else{
	$query = "SELECT * FROM menu WHERE CAT_OF_FOOD = 'ground floor'";
	$result = mysqli_query($connect,$query);
// FIx the displaying
		$pdf ->SetFont('Arial','B',14);
		$pdf ->Cell(189,5,'GROUND FLOOR',0,1,'C');

	while ($info = mysqli_fetch_assoc($result)) {
		$name = $info['NAME_OF_FOOD'];
		$price = $info['PRICE'];
		
		$pdf ->SetFont('Arial','',15);
		$pdf ->Cell(189,5,'',0,1);
		$pdf ->Cell(92,5,$name,0,0,'C');
		$pdf ->Cell(5,5,'-',0,0);
		$pdf ->Cell(0,5,$price,0,1,'C');

	}
}

// FIRST FLOOR
if(!$connect){
	die('Database connection failed!!');
}else{
	$query = "SELECT * FROM menu WHERE CAT_OF_FOOD = 'first floor'";
	$result = mysqli_query($connect,$query);
// FIx the displaying
		$pdf ->SetFont('Arial','B',14);
		$pdf ->Cell(40,5,'',0,1);
		$pdf ->Cell(189,5,'FIRST FLOOR',0,1,'C'); 

	while ($info = mysqli_fetch_assoc($result)) {
		$name = $info['NAME_OF_FOOD'];
		$price = $info['PRICE'];
		
		$pdf ->SetFont('Arial','',15);
		$pdf ->Cell(189,5,'',0,1);
		$pdf ->Cell(92,5,$name,0,0,'C');
		$pdf ->Cell(5,5,'-',0,0);
		$pdf ->Cell(0,5,$price,0,1,'C');

	}
}

// SECOND FLOOR
if(!$connect){
	die('Database connection failed!!');
}else{
	$query = "SELECT * FROM menu WHERE CAT_OF_FOOD = 'second floor'";
	$result = mysqli_query($connect,$query);
// FIx the displaying
		$pdf ->SetFont('Arial','B',14);
		$pdf ->Cell(40,5,'',0,1);
		$pdf ->Cell(189,5,'SECOND FLOOR',0,1,'C'); 

	while ($info = mysqli_fetch_assoc($result)) {
		$name = $info['NAME_OF_FOOD'];
		$price = $info['PRICE'];
		
		$pdf ->SetFont('Arial','',15);
		$pdf ->Cell(189,5,'',0,1);
		$pdf ->Cell(92,5,$name,0,0,'C');
		$pdf ->Cell(5,5,'-',0,0);
		$pdf ->Cell(0,5,$price,0,1,'C');

	}
}
$pdf ->Cell(189,50,'',0,1);

// THIRD FLOOR
if(!$connect){
	die('Database connection failed!!');
}else{
	$query = "SELECT * FROM menu WHERE CAT_OF_FOOD = 'third floor'";
	$result = mysqli_query($connect,$query);
// FIx the displaying
		$pdf ->SetFont('Arial','B',14);
		$pdf ->Cell(189,5,'THIRD FLOOR',0,1,'C'); 

	while ($info = mysqli_fetch_assoc($result)) {
		$name = $info['NAME_OF_FOOD'];
		$price = $info['PRICE'];
		
		$pdf ->SetFont('Arial','',15);
		$pdf ->Cell(189,5,'',0,1);
		$pdf ->Cell(92,5,$name,0,0,'C');
		$pdf ->Cell(5,5,'-',0,0);
		$pdf ->Cell(0,5,$price,0,1,'C');

	}
}

// FOURTH FLOOR
if(!$connect){
	die('Database connection failed!!');
}else{
	$query = "SELECT * FROM menu WHERE CAT_OF_FOOD = 'fourth floor'";
	$result = mysqli_query($connect,$query);
// FIx the displaying
		$pdf ->SetFont('Arial','B',14);
		$pdf ->Cell(189,5,'FORTH FLOOR',0,1,'C'); 

	while ($info = mysqli_fetch_assoc($result)) {
		$name = $info['NAME_OF_FOOD'];
		$price = $info['PRICE'];
		
		$pdf ->SetFont('Arial','',15);
		$pdf ->Cell(189,5,'',0,1);
		$pdf ->Cell(92,5,$name,0,0,'C');
		$pdf ->Cell(5,5,'-',0,0);
		$pdf ->Cell(0,5,$price,0,1,'C');

	}
}

// FIFTH FLOOR
if(!$connect){
	die('Database connection failed!!');
}else{
	$query = "SELECT * FROM menu WHERE CAT_OF_FOOD = 'fifth floor'";
	$result = mysqli_query($connect,$query);
// FIx the displaying
		$pdf ->SetFont('Arial','B',14);
		$pdf ->Cell(189,5,'FIFTH FLOOR',0,1,'C'); 

	while ($info = mysqli_fetch_assoc($result)) {
		$name = $info['NAME_OF_FOOD'];
		$price = $info['PRICE'];
		
		$pdf ->SetFont('Arial','',15);
		$pdf ->Cell(189,5,'',0,1);
		$pdf ->Cell(92,5,$name,0,0,'C');
		$pdf ->Cell(5,5,'-',0,0);
		$pdf ->Cell(0,5,$price,0,1,'C');

	}
}

//SIXTH FLOOR
if(!$connect){
	die('Database connection failed!!');
}else{
	$query = "SELECT * FROM menu WHERE CAT_OF_FOOD = 'sixth floor'";
	$result = mysqli_query($connect,$query);
// FIx the displaying
		$pdf ->SetFont('Arial','B',14);
		$pdf ->Cell(189,5,'SIXTH FLOOR',0,1,'C'); 

	while ($info = mysqli_fetch_assoc($result)) {
		$name = $info['NAME_OF_FOOD'];
		$price = $info['PRICE'];
		
		$pdf ->SetFont('Arial','',15);
		$pdf ->Cell(189,5,'',0,1);
		$pdf ->Cell(92,5,$name,0,0,'C');
		$pdf ->Cell(5,5,'-',0,0);
		$pdf ->Cell(0,5,$price,0,1,'C');

	}
}
// Generates pdf
$pdf -> Output();
?>
