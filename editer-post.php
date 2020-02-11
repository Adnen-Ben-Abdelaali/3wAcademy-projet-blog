<?php

include "database.php";


if( (!empty($_GET)) && (empty($_POST)) ) {
 
// var_dump ($_GET);
  
$idArticleEditer = $_GET["id"];
$template = "editer-post";
include "layout.phtml";


}else if(  (!empty($_POST)) ) {

var_dump($_POST);
$query = "UPDATE Post SET  Title = ? , Contents = ? , CreationTimestamp = NOW() WHERE Id = ? ";

$editer = $pdo->prepare($query);

$editer->execute( array( htmlspecialchars($_POST['title']), 

                        htmlspecialchars($_POST['article']), 
                
                        htmlspecialchars($_POST['articleId'])) );

header("Location:index.php");
}