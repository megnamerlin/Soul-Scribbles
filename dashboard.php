<?php 
include 'db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM journal_entries WHERE user_id = $user_id ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Journal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d8e8d8;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            border: 2px solid #b5c8a8;
        }

        h2 {
            color: #4f6f52;
            text-align: center;
        }

        a {
            color: #2c3e2b;
            text-decoration: none;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        .entry {
            border: 1px solid #4f6f52;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #eef3e6;
            border-radius: 5px;
        }

        .entry h3 {
            margin: 0;
            color: #4f6f52;
        }

        .entry p {
            margin: 5px 0;
        }

        .entry small {
            display: block;
            text-align: right;
            color: #3f5f42;
        }

        .nav-links {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Your Journal</h2>
        <div class="nav-links">
            <a href="new_entry.php">+ New Entry</a> | <a href="logout.php">Logout</a>
        </div>

        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="entry">
                <h3><?= htmlspecialchars($row['title']) ?></h3>
                <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
                <small><?= htmlspecialchars($row['created_at']) ?></small>
            </div>
        <?php endwhile; ?>

    </div>

</body>
</html>

