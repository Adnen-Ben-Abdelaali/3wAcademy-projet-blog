<?php

$pdo = new PDO("mysql:host=localhost;dbname=blog", 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


