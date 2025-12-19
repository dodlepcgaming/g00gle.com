<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Marks Epic Website</title>
            <h2 class="header" id="myHeader">GOOGLE.COM</h2>
    </head>

    <body>
        <h1>Totally a search abr</h1>
        <p>Give me your information please :D</p>
        <form action="index.php" method="post">
            <label for="searchquery">Search</label>
            <input type="text" id="searchquery" name="searchquery" required onblur="validateRequired(this, 'searchqueryError')"><br>
            <input type="submit" value="Submit">
        </form> 

        <script>
            function validateRequired(field, errorId) {
                var errorSpan = document.getElementById(errorId);
                if (field.value.trim() === "") {
                    errorSpan.style.display = "inline";
                } else {
                    errorSpan.style.display = "none";
                }
            }
        </script>
    
    <?php
    echo $_SERVER["REMOTE_ADDR"];
    $myfile = fopen("UserIPaddr.txt", "w");
    fwrite($myfile, $_SERVER["REMOTE_ADDR"]);
    fclose($myfile);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchquery'])) {
        $server = "markraspi5";
        $username = "php";
        $password = "password";
        $database = "ClientList";

        $conn = mysqli_connect($server, $username, $password, $database);

        if (!$conn) {
            die("<p style='color:red;'>Connection failed: " . mysqli_connect_error() . "</p>");
        }

        $fname = mysqli_real_escape_string($conn, $_POST['searchquery']);
        $sql = "INSERT INTO client_car (searchquery) VALUES ('$fname');";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $new_id = mysqli_insert_id($conn);
            echo "<p style='color:lime;'>Success! Your data was added to the database.</p>";
            echo "<p style='color:white;'>Your assigned ID is: <b>$new_id</b></p>";
        } else {
            echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
        }
        mysqli_close($conn);
        header("Location: https://acme.co");
        exit();
    }
    ?>
    <br>
    <p>Your IP address has been recorded.</p>

</body>
</html>