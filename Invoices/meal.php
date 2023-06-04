<?php
// Generates current date
include_once '../admin/includes/db.php';

$current_date = date("d/m/y");
$serial = mt_rand(0, 1000000);

$sql = "SELECT * FROM orders WHERE  id=(SELECT max(id) FROM orders)";
$result = mysqli_query($connect, $sql);
while($row=mysqli_fetch_array($result)){
    $fname = $row['firstname'];
    $lname = $row['lastname'];
    $products = $row['products'];
    $total = $row['amount_paid'];
    $fullname = $fname. " " . $lname;
}

require('fpdf.php');
$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
//images used for the pdf
$pdf->Image('./images/Renting.png',12,10,188,10);
$pdf->Image('./images/Ellins.png',114,30,85,10);
$pdf->Image('./images/Footer.png',28,240,150,50);
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);
$pdf->Cell(189 ,80,'',0,0);//end of line
$pdf->Image('./images/Sekulogo.png',8,22,27,25);
$pdf->Cell(189 ,38,'',0,1);//end of line
$pdf->Cell(130 ,5,'ELLINS HOSTEL AND ACCOMMODATION,',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'P.O Box ***-******',0,1);
$pdf->Cell(28 ,5,'Nyamage Primary School,',0,1);
$pdf->Cell(28 ,5,'Kisii,',0,1);
$pdf->Cell(130 ,5,'Tel no:(+254) 7********.',0,1);

$pdf->SetFillcolor(209,207,207);
$pdf->Cell(100,20,'',0,1);//end of line
$pdf->Cell(140,10,$fullname,0,0);//end of line
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
$pdf->Cell(2 ,10,'',0,0);
$pdf->Cell(135 ,10,'Bookings:',1,0,"C",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(45 ,10,'Amount',1,1,"C",true);//end of line


$pdf->SetFont('Arial','',10);

$pdf->Cell(190 ,1,'',0,1);
$pdf->Cell(2 ,10,'',0,0);
$pdf->Cell(135 ,8,$products,1,0);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(45 ,8,$total,1,1,"R");//end of line
$pdf->Cell(180 ,20,'',0,1);

//summary
$pdf->SetFillcolor(209,207,207);
$pdf->Cell(100 ,20,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(38 ,8,'Total',1,0,"L",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(9 ,8,'Ksh',1,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(38 ,8,$total,1,1,'R');//end of line

$pdf->Cell(100 ,20,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(38 ,8,'Amount Paid',1,0,"L",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(9 ,8,'Ksh',1,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(38 ,8,'0',1,1,'R');//end of line


$pdf->Cell(100 ,20,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(38 ,8,'Balance due',1,0,"L",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(9 ,8,'Ksh',1,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(38 ,8,$total,1,1,'R');//end of line



$pdf->Output();
?>
