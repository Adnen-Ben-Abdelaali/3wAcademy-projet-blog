<?php
include "database.php";

$query = $pdo->prepare("SELECT Post.Title, Post.Contents, Post.Id,
Author.FirstName, Author.LastName FROM Post INNER JOIN Author ON 
Post.Author_Id = Author.Id");
$query->execute();

$posts = $query->fetchAll();





$template = 'index';
include "layout.phtml";

