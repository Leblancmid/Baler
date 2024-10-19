<?php
session_start();
include "../connection.php";
header('Content-Type: application/json');

$response = array();

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username)) {
        $response['error'] = "Username is required";
        echo json_encode($response);
        exit();
    } else if (empty($password)) {
        $response['error'] = "Password is required";
        echo json_encode($response);
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE (username='$username' OR email='$username') AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (($row['username'] == $username || $row['email'] == $username) && $row['password'] == $password) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                $response['success'] = true;
                echo json_encode($response);
                exit();
            }
        }
        $response['error'] = "Invalid entered credentials";
        echo json_encode($response);
        exit();
    }
} else {
    $response['error'] = "Invalid request";
    echo json_encode($response);
    exit();
}
