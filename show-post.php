<?php 


var_dump($_GET);

// echo "{$_GET['id']}";

$postId = $_GET["id"];
echo "{$_GET['id']}";
include "database.php";

$queryPostsById = $pdo->prepare("SELECT Post.Contents, Post.CreationTimestamp, 
                                
                                Post.Title, Author.FirstName, Author.LastName 
                                FROM Post INNER JOIN Author ON Post.Id = Author.Id 
                                WHERE Post.Id = $postId");

$queryPostsById->execute();

$PostsById = $queryPostsById->fetch(PDO::FETCH_ASSOC);


 // var_dump ($PostsById);



$queryCommentById = $pdo->prepare("SELECT Comment.Contents, 
                                 
                                  Comment.NickName FROM Comment INNER JOIN Post ON 
                                  Comment.Post_Id = Post.Id WHERE Post.Id = $postId");

$queryCommentById->execute();

$CommentById = $queryCommentById->fetchAll(PDO::FETCH_ASSOC);


$template = "show-post";

include "layout.phtml";