<?php 
include 'db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO journal_entries (user_id, title, content) VALUES ('$user_id', '$title', '$content')";
    $conn->query($sql);
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Journal Entry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d8e8d8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 500px;
            border: 2px solid #b5c8a8;
        }

        h2 {
            color: #4f6f52;
            text-align: center;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #4f6f52;
            border-radius: 5px;
            background-color: #eef3e6;
        }

        button {
            background-color: #4f6f52;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        button:hover {
            background-color: #3f5f42;
        }

        .nav-links {
            text-align: center;
            margin-top: 10px;
        }

        a {
            color: #2c3e2b;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>New Journal Entry</h2>
        <form method="POST">
            <input name="title" type="text" placeholder="Title" required>
            <textarea name="content" placeholder="Write your entry..." rows="10" required></textarea>
            <button type="submit">Save Entry</button>
        </form>
        <div class="nav-links">
            <a href="dashboard.php">Back to Dashboard</a>
        </div>
    </div>

</body>
</html>
