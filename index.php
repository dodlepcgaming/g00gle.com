<!DOCTYPE html>
<html>
<head>
    <title>GOOGLE.COM</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="searchquery" placeholder="Enter search term">
        <button type="submit">Search</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchquery'])) {
        $server = "markraspi5";
        $username = "php";
        $password = "password";
        $database = "ClientList";

        $conn = mysqli_connect($server, $username, $password, $database);
        if (!$conn) {
            die("<p style='color:red;'>Connection failed: " . mysqli_connect_error() . "</p>");
        }

        $searchquery = mysqli_real_escape_string($conn, $_POST['searchquery']);
        $ipaddress = mysqli_real_escape_string($conn, $_SERVER['REMOTE_ADDR']);
        $sql = "INSERT INTO client_car (searchquery, ipaddress) VALUES ('$searchquery', '$ipaddress');";
        mysqli_query($conn, $sql);
        mysqli_close($conn);

        $redirectUrl = "https://www.google.com/search?q=" . urlencode($_POST['searchquery']);
        header("Location: $redirectUrl");
        exit();
    }
    ?>
</body>
</html>