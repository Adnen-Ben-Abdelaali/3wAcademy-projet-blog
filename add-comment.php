<?php

var_dump ($_POST);

include "database.php";

$query = "INSERT INTO Comment (NickName, Contents, Post_Id  ,CreationTimestamp) 
          VALUES (? ,?, ?, NOW())";

$insertionOfNewComment = $pdo->prepare($query);

$insertionOfNewComment->execute(array(htmlspecialchars($_POST['pseudo']), 
                                
                                htmlspecialchars($_POST['commentaire']),
                                
                                htmlspecialchars($_POST["addButton"])));

 header ("location:show-post.php?id=" .$_POST['addButton']);
exit();



