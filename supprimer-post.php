<?php

include "database.php";

$idAricleSupprimer = $_GET['id'];

$query = "DELETE FROM Post WHERE Id = $idAricleSupprimer";

$supprimer = $pdo->prepare($query);

$supprimer->execute();

header("Location:index.php");
exit();

