<?php
    include 'db.php';

    try {
        $db = new Database();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $db->insert($_POST['email'], $_POST['password']);
            echo "Successfully submitted";
        }
    } catch (\Exception $e){
        echo "ERROR: " . $e->getMessage();
    }
    ?>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Password</th>
        </tr>

        <?php
        $stmt = $db->selectAll();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . " | ";
                echo "<td>" . $row['email'] . " | ";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td><a class='btn btn-primary' href='#?id=" . $row['id'] . "'>Edit</a> | <a class='btn btn-danger' href='delete7.php?id=" . $row['id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No users found</td></tr>";
        }
        ?>
    </table>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <form method="POST">
        <label for="email">Email:</label> <br>
        <input type="text" name="email"> <br>
        <label for="password">Password:</label> <br>
        <input type="password" name="password"> <br>
        <input type="submit">
    </form>


</body>
</html>
