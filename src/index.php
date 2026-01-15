<?php 
require 'db.php'; 

// Handle Form Submission (Adding a Book)
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];

    if(!empty($title) && !empty($author) && !empty($price)) {
        $sql = "INSERT INTO books (title, author, price) VALUES (:title, :author, :price)";
        $stmt = $pdo->prepare($sql);
        if($stmt->execute(['title' => $title, 'author' => $author, 'price' => $price])) {
            $message = "Book added successfully!";
        } else {
            $message = "Error adding book.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store Manager</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f4f9; padding: 20px; text-align: center; }
        .container { max-width: 800px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background-color: #2c3e50; color: white; }
        .form-group { margin-bottom: 15px; }
        input { padding: 10px; width: 90%; margin: 5px 0; border: 1px solid #ddd; border-radius: 5px; }
        button { padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #218838; }
        .alert { color: green; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📚 Book Store Inventory</h1>
        
        <h3>Add a New Book</h3>
        <?php if($message): ?><p class="alert"><?= $message ?></p><?php endif; ?>
        <form method="POST">
            <input type="text" name="title" placeholder="Book Title" required>
            <input type="text" name="author" placeholder="Author Name" required>
            <input type="number" step="0.01" name="price" placeholder="Price (e.g. 19.99)" required>
            <button type="submit">Add Book</button>
        </form>

        <h3>Current Inventory</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM books ORDER BY id DESC");
                while ($row = $stmt->fetch()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>" . htmlspecialchars($row['title']) . "</td>
                        <td>" . htmlspecialchars($row['author']) . "</td>
                        <td>€" . htmlspecialchars($row['price']) . "</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>