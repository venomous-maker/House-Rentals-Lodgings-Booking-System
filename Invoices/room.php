<?php
include ('../admin/includes/class.user.php');
include_once '../admin/includes/db.php';

$current_date = date("d/m/y");
$serial = mt_rand(0, 1000000);

$user=new User();
require('fpdf.php');
$pdf= new FPDF();

$pid = $_GET['rid'];

	$sql ="select * from rooms where room_id = '$pid' ";
	$re = mysqli_query($connect,$sql);
	while($row=mysqli_fetch_array($re))
	{
		$id = $row['room_id'];
		$roomtype =$row['room_cat'];
		$name = $row['name'];
		$price = $row['roomprice'];
		$amount = $row['amount'];
		$phone = $row['phone'];
		$cin_date = $row['checkin'];
		$cout_date = $row['checkout'];
		$days = $row['days'];
		
	}

$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
//images used for the pdf
$pdf->Image('images\header.jpg',11,10,188,10);
$pdf->Image('images\seku.JPG',114,30,85,10);
$pdf->Image('images\footer.JPG',28,240,150,50);
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);
$pdf->Cell(189 ,80,'',0,0);//end of line
$pdf->Image('images\sekulogo.png',8,22,27,25);
$pdf->Cell(189 ,38,'',0,1);//end of line
$pdf->Cell(130 ,5,'SEKU GUEST HOUSE,',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'P.O Box 170-9020',0,1);
$pdf->Cell(28 ,5,'Kwa vonza,',0,1);
$pdf->Cell(28 ,5,'Kitui,',0,1);
$pdf->Cell(130 ,5,'Tel no:(+254) 7025 98123.',0,1);

$pdf->SetFillcolor(209,207,207);
$pdf->Cell(100,20,'',0,1);//end of line
$pdf->Cell(140,10, $name ,0,0);//end of line
$pdf->Cell(22,8,'Serial No',1,0,"L",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23,8,$serial,1,1);//end of line


$pdf->Cell(140 ,1,'',0,1);//end of line
$pdf->Cell(140 ,10,'',0,0);//end of line
$pdf->Cell(22,8,'Date',1,0,"L",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23,8,$current_date,1,1);//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->SetFillcolor(209,207,207);
//invoice contents
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25 ,10,'',0,0);
$pdf->Cell(45 ,10,'Room Type',1,0,"C",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(45 ,10,'No of days',1,0,"C",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(45 ,10,'Price per Room',1,1,"C",true);


$pdf->SetFont('Arial','',10);

$pdf->Cell(190 ,1,'',0,1);
$pdf->Cell(25 ,10,'',0,0);
$pdf->Cell(45 ,8,$roomtype,1,0,"C");
$pdf->Cell(1 ,8,'',0,0);//end of line
$pdf->Cell(45 ,8,$days,1,0,"C");
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(45 ,8,$price,1,1,"C");//end of line
$pdf->Cell(180 ,20,'',0,1);


//summary
$pdf->SetFillcolor(209,207,207);
$pdf->Cell(76 ,20,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(38 ,8,'Total',1,0,"L",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(9 ,8,'Ksh',1,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(38 ,8,$amount,1,1,'C');//end of line

$pdf->Cell(76 ,20,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(38 ,8,'Amount Paid',1,0,"L",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(9 ,8,'Ksh',1,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(38 ,8,'0',1,1,'C');//end of line


$pdf->Cell(76 ,20,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(38 ,8,'Balance due',1,0,"L",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(9 ,8,'Ksh',1,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(38 ,8,$amount,1,1,'C');//end of line



$pdf->Output();
?>
