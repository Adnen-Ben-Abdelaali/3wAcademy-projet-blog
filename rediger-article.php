<?php


/*

import

author's name, 

category's name from database

*/

include "database.php";

$queryGetAuthor = "SELECT FirstName, LastName, Id FROM Author ";

$GetInformationsRequest = $pdo->prepare($queryGetAuthor);

$GetInformationsRequest->execute();

$GetInformationsArray = $GetInformationsRequest->fetchAll(PDO::FETCH_ASSOC); 

// var_dump($GetInformationsArray);

// Query to import categories  

$queryGetCategories = "SELECT Id, Name FROM Category";

$getCategory = $pdo->prepare($queryGetCategories);

$getCategory->execute();

$getCategoryArray = $getCategory->fetchAll(PDO::FETCH_ASSOC);

// var_dump($getCategoryArray);



$template = "rediger-article";

include "layout.phtml";


if( !empty($_POST)) {

 // var_dump($_POST);

  $queryCreateNewArticle = "INSERT INTO Post (Title, Contents, Author_Id, Category_Id, CreationTimestamp) 
                                              
                            VALUES (?, ?, ?, ?, NOW())";

  $getCreateNewArticle = $pdo->prepare($queryCreateNewArticle);
  $getCreateNewArticle->execute( array(htmlspecialchars($_POST["title"]), htmlspecialchars($_POST["article"]), 
                                
                                htmlspecialchars($_POST["auteur"]), htmlspecialschars($_POST["categorie"]) ) );  

  header("Location:index.php");
}


