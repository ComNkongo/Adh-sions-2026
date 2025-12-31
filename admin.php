<?php
$files = glob("pdf/*.pdf");
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin – Collectif NKONGÔ</title>
<style>
body{font-family:Arial;background:#f4f6f5;padding:20px;}
table{width:100%;background:#fff;border-collapse:collapse;}
th,td{padding:10px;border:1px solid #ccc;}
th{background:#1e8449;color:#fff;}
</style>
</head>
<body>

<h2>📂 Dossiers d’adhésion</h2>

<table>
<tr>
<th>#</th>
<th>PDF</th>
<th>Télécharger</th>
</tr>

<?php foreach($files as $i=>$file): ?>
<tr>
<td><?= $i+1 ?></td>
<td><?= basename($file) ?></td>
<td><a href="<?= $file ?>" target="_blank">📥 Télécharger</a></td>
</tr>
<?php endforeach; ?>

</table>
echo decryptData($row['telephone']);

<?php
return [
 [
  "user" => "admin",
  "pass" => password_hash("Nkongo@2025", PASSWORD_DEFAULT),
  "role" => "super"
 ],
 [
  "user" => "secretariat",
  "pass" => password_hash("Secret@2025", PASSWORD_DEFAULT),
  "role" => "viewer"
 ]
];
$admins = require '../data/admins.php';

foreach ($admins as $a) {
 if ($a['user'] === $_POST['user'] && password_verify($_POST['pass'], $a['pass'])) {
    $_SESSION['admin'] = $a;
 }
}


</body>
</html>
