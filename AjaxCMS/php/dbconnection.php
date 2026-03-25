<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "db_ajaxcms";

    $conn = mysqli_connect("localhost", "root", "","db_ajaxcms",3307);

    if(!$conn) {
        die("Connection failed: " .mysqli_connect_error());
    }
    // Function
    function add_post($conn, $userId, $title, $content) {

        $sql = "INSERT INTO tbl_post (user_id, title, content)
                VALUES ('$userId', '$title', '$content')";

        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    function getAllUserPost($conn, $userId) {
        $query = "SELECT * FROM tbl_post WHERE user_id = $userId";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    function getAllPost($conn) {
        $query = "SELECT * FROM tbl_post";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    function getCount($conn) {
        $result = getAllPost($conn);
        $count = mysqli_num_rows($result);
        return $count;
    }
    
    function getAllUser($conn) {
        $query = "SELECT * FROM tbl_user";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    function addUser($conn, $email, $name) {
        $sql = "INSERT INTO tbl_user (email, name, role)
                VALUES ('$email', '$name', 'user')";
        if(mysqli_query($conn, $sql)){
            return true;
        } else return false;
    }
    function deletePost($conn, $id) {
        $query = "DELETE FROM tbl_post WHERE id = $id";
        if (mysqli_query($conn, $query)) {
            return true;
        } else {
            return false;
        }
    }
    function deleteUser($conn, $id) {
        $query = "DELETE FROM tbl_user WHERE id = $id";
        if (mysqli_query($conn, $query)) {
            return true;
        } else {
            return false;
        }
    }
?>