<?php
session_start();
if (!isset($_SESSION['admin'])) header("Location: login.php");

$rows = array_map('str_getcsv', file("../data/adhesions.csv"));
?>
<h2>📂 Adhésions NKONGÔ</h2>
<table border="1">
<tr>
<th>ID</th><th>Nom</th><th>Téléphone</th><th>PDF</th>
</tr>
<?php foreach ($rows as $r): ?>
<tr>
<td><?= $r[0] ?></td>
<td><?= $r[1] ?></td>
<td><?= $r[2] ?></td>
<td><a href="../pdf/<?= $r[3] ?>">PDF</a></td>
</tr>
<?php endforeach; ?>
</table>
<a href="logout.php">Déconnexion</a>
