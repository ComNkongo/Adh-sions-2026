<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();

/* HEADER */
$pdf->Image('images/logo-nkongo.png',10,10,30);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'COLLECTIF NKONGO',0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,8,'FORMULAIRE D’ADHESION',0,1,'C');
$pdf->Ln(10);

/* INFOS */
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,8,
"Nom : ".$_POST['nom']."
Prenoms : ".$_POST['prenoms']."
Sexe : ".$_POST['sexe']."
Telephone : ".$_POST['telephone']."
Email : ".$_POST['email']."
Profession : ".$_POST['profession']
);

$pdf->Ln(5);
$pdf->MultiCell(0,8,
"Carte membre : 5 000 FCFA
Cotisation : 2 000 FCFA / mois"
);

/* SAVE */
$filename = "pdf/adhesion_".time().".pdf";
$pdf->Output('F', $filename);

echo $filename;
