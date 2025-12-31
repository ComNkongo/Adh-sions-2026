<?php
$dir = "uploads/";
if (!is_dir($dir)) mkdir($dir);

foreach ($_FILES as $file) {
    $name = time() . "_" . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $dir . $name);
}

echo "<h2>Adhésion envoyée avec succès</h2>";

include('generate_pdf.php');

$to = "collectifnkongo@gmail.com";
$subject = "Nouvelle adhésion NKONGÔ";

$message = "Nouvelle adhésion reçue\n\nNom: ".$_POST['nom']."
\nTéléphone: ".$_POST['telephone'];

$headers = "From: noreply@nkongo.org";

mail($to, $subject, $message, $headers);

$idFile = "data/last_id.txt";
$last = file_exists($idFile) ? (int)file_get_contents($idFile) : 0;
$newId = $last + 1;
file_put_contents($idFile, $newId);

$data = $_POST['signature'];
$data = str_replace('data:image/png;base64,','',$data);
file_put_contents("signature/$newId.png", base64_decode($data));

$csv = fopen("data/adhesions.csv","a");
fputcsv($csv, [
 "NK-".str_pad($newId,4,"0",STR_PAD_LEFT),
 $_POST['nom'],
 $_POST['telephone'],
 $pdfFile
]);
fclose($csv);


require 'security.php';

$telephone = encryptData($_POST['telephone']);
$email     = encryptData($_POST['email']);
 
?>
