<?php
include 'connection.php';

// Assume user ID is available, e.g., through session or passed as a parameter
$user_id = 1; // Example user ID

// Check if form was submitted to update user info
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $profile_picture = $_FILES['profile_picture']['name'];
    $password = $_POST['password'];

    // Update profile picture if a new file is uploaded
    if (!empty($profile_picture)) {
        $target_dir = "../IMAGES/";
        $target_file = $target_dir . basename($profile_picture);
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file);
    } else {
        $profile_picture = $_POST['existing_profile_picture'];
    }

    // Hash the password if it's being updated
    $password_hash = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : $_POST['existing_password'];

    // Update user data in the database
    $sql = "UPDATE users SET name=?, username=?, email=?, profile_picture=?, password=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $username, $email, $profile_picture, $password_hash, $user_id);
    $stmt->execute();
    $stmt->close();

    // Redirect to the same page to see changes
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Fetch user data from the database
$sql = "SELECT profile_picture, name, username, email, password FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();
$conn->close();
