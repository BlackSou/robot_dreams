<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
<h2>Login Form</h2>

<?php
if (!empty($_POST["email"]) && !empty($_POST["password"])) {
    $email = htmlspecialchars($_POST["email"]);

    echo "Ви намагалися залогінитися з email: " . $email;
}
?>

<form method="post">
    <label for="email">Email:</label>
    <input type="text" name="email" required>

    <br>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <br>

    <input type="submit" value="Sign up">
</form>
</body>
</html>
