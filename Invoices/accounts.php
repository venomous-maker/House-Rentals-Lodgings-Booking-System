<?php

require('fpdf.php');
$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
//images used for the pdf
$pdf->Image('images\account.jpg',12,10,188,10);
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
$pdf->Cell(140,10,'Davis Nyabwari',0,0);//end of line
$pdf->Cell(22,8,'Serial No',1,0,"L",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23,8,'123',1,1);//end of line


$pdf->Cell(140 ,1,'',0,1);//end of line
$pdf->Cell(140 ,10,'',0,0);//end of line
$pdf->Cell(22,8,'Date',1,0,"L",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23,8,'13/04/2020',1,1);//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->SetFillcolor(209,207,207);
//invoice contents
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1 ,10,'',0,0);
$pdf->Cell(23 ,10,'Type of room',1,0,"C",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23 ,10,'No of rooms',1,0,"C",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23 ,10,'Days',1,0,"C",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23 ,10,'Room price',1,0,"C",true);//end of line
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23 ,10,'Type of Food',1,0,"C",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23 ,10,'Food sold',1,0,"C",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23 ,10,'Quantity',1,0,"C",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23 ,10,'Price',1,1,"C",true);//end of line


$pdf->SetFont('Arial','',10);

$pdf->Cell(1 ,10,'',0,0);
$pdf->Cell(23 ,10,'Executive',1,0);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23 ,10,'1',1,0);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23 ,10,'10',1,0);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23 ,10,'10,000',1,0);//end of line
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23 ,10,'Snack',1,0);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23 ,10,'Andazi',1,0);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23 ,10,'2',1,0);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(23 ,10,'10',1,1);//end of line

//summary
$pdf->SetFillcolor(209,207,207);




$pdf->Cell(100 ,40,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(105 ,10,'',0,0);//end of line
$pdf->Cell(38 ,8,'Amount earned',1,0,"L",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(9 ,8,'Ksh',1,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(38 ,8,'',1,1,'R');//end of line

$pdf->Cell(100 ,1,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(105 ,10,'',0,0);//end of line
$pdf->Cell(38 ,8,'Profit earned',1,0,"L",true);
$pdf->Cell(1 ,10,'',0,0);//end of line
$pdf->Cell(9 ,8,'Ksh',1,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(38 ,8,'',1,1,'R');//end of line


$pdf->Output();
?>
