<?php
session_start();
$error = "";

if ($_POST) {
    if ($_POST['user'] === "admin" && $_POST['pass'] === "Nkongo@2025") {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Identifiants incorrects";
    }
}
?>
<form method="POST">
<h2>Connexion Admin</h2>
<input name="user" placeholder="Utilisateur" required>
<input name="pass" type="password" placeholder="Mot de passe" required>
<button>Connexion</button>
<p style="color:red"><?= $error ?></p>
</form>
