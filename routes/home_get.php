<?php


$userData = [];
if (isset($_SESSION['user_id'])) {
    $conn = getConnection();
    $stmt = $conn->prepare('SELECT * FROM user WHERE userID = ?');
    $stmt->bind_param('i', $_SESSION['user_id']);
    $stmt->execute();
    $userData = $stmt->get_result()->fetch_assoc() ?: [];
}

renderView('main_get', ['userData' => $userData]);
