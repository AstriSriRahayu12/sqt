<?php
session_start();
require 'db_connect.php';

$userId = $_SESSION['user_id'];

// Fetch random books that the user hasn't read yet
$sql = "
    SELECT b.id, b.title, b.author, b.genre, b.image
    FROM books b
    LEFT JOIN user_reading_history urh ON urh.book_id = b.id AND urh.user_id = ?
    WHERE urh.book_id IS NULL
    ORDER BY RAND()
    LIMIT 10
";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userId]);
$recommendedBooks = $stmt->fetchAll();

echo json_encode($recommendedBooks);
?>
