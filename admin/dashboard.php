<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - PusatPustaka</title>
</head>

<body>
    <h1>Selamat Datang, <?php echo $_SESSION['nama_lengkap']; ?>!, anda adalah <?php echo $_SESSION['role']; ?></h1>
    <br>
    <a href="../logout.php">Logout</a>
</body>

</html>