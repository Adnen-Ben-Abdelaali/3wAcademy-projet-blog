<?php

include "database.php";

$queryOne = "SELECT Post.Title, Post.Contents, Author.FirstName, 
Author.LastName , Category.Name, Post.Id FROM Post INNER JOIN Author ON Post.Author_Id = Author.Id
INNER JOIN Category ON Post.Category_Id = Category.Id";

$request = $pdo->prepare($queryOne);

$request->execute();

$table = $request->fetchAll(PDO::FETCH_ASSOC);

// var_dump($table);

$template = "admin";
include "layout.phtml";