<?php 
include 'db.php';
$db = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $db->selectID($id);
    $user = $stmt->fetch();

    if (!$user) {
        echo "User not found.";
        exit();
    }

    if (isset($_POST['update'])) {
        $db->update($id);
        header("Location: home.php");
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gebruiker</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h1 class="edit">Gebruiker bewerken</h1>
<form method="post">
    <input type="text" id="new_email" name="new_email" value="<?php echo $user['email']; ?>" required><br>

    <input type="password" id="new_wachtwoord" name="new_wachtwoord" placeholder="Nieuw Wachtwoord" required><br>

    <button type="submit" name="update" class='btn btn-primary'>Bijwerken</button>
</form>
</body>
</html>

