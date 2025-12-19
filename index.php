<!DOCTYPE html>
<html>
<head>
    <title>Get User IP Address</title>
</head>
<body>
    <h1>User IP Address</h1>
    <?php
    echo $_SERVER["REMOTE_ADDR"];
    $myfile = fopen("/home/mark/Desktop/UserIPaddr.txt", "w");
    fwrite($myfile, $_SERVER["REMOTE_ADDR"]);
    fclose($myfile);

    header("Location: https://acme.co");

    $server = "markraspi5";
    $username = "php";
    $password = "password";
    $database = "ClientList";

    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn) {
        die("<p style='color:red;'>Connection failed: " . mysqli_connect_error() . "</p>");
    }

    $fname = mysqli_real_escape_string($conn, $_POST['searchquery']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $car   = mysqli_real_escape_string($conn, $_POST['car']);

    $sql = "INSERT INTO client_car (client_FN, client_LN, client_car)
            VALUES ('$fname', '$lname', '$car');";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $new_id = mysqli_insert_id($conn);
        echo "<p style='color:lime;'>Success! Your data was added to the database.</p>";
        echo "<p style='color:white;'>Your assigned ID is: <b>$new_id</b></p>";
    } else {
        echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
    }


    ?>
    <br>
    <p>Your IP address has been recorded.</p>

</body>
</html>