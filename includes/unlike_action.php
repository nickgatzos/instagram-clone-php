<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 04/02/2018
 * Time: 17:25
 */
session_start();

require_once "{$_SERVER['DOCUMENT_ROOT']}/includes/db_connect.php";

$unlike_pid = $_POST['unlike_pid'];
$username = $_SESSION['username'];

// Check if user liked before or not
function unlike_action($unlike_pid, $username) {
    global $conn;
    $fetch_likes = $conn->query("SELECT * FROM posts_likes WHERE pid = '$unlike_pid' AND username = '$username'");

    if ($fetch_likes->num_rows > 0) {
        $conn->query("UPDATE posts_likes SET liked = 0 WHERE pid = '$unlike_pid' AND username='$username'");
    }
}
unlike_action($unlike_pid, $username);



