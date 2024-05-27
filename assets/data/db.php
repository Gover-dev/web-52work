<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "website";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn){
        die("error". mysqli_connect_error());
    };

    $servername_chat = "localhost";
    $username_chat = "root";
    $password_chat = "";
    $dbname_chat = "chat";

    $conn_chat = mysqli_connect($servername_chat, $username_chat, $password_chat, $dbname_chat);

    if(!$conn){
        die("error". mysqli_connect_error());
    };
    
?>