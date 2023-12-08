<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Deleted</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include 'db.php'; 
$db = new Database();


if (isset($db)) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $db->delete($id);
        if ($stmt->execute()) {
            echo "Gebruiker verwijderd.";
            echo "<br>";
            echo '<a class="btn btn-primary" href="home.php">Terug</a>';
        } else {
            echo "Fout bij verwijderen.";
        }
    } else {
        echo "Geen gebruiker ID geselecteerd.";
    }
} else {
    echo "Database connection not established.";
}
?>
</body>
</html>
