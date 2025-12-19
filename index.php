<?php
        $server = "markraspi5";
        $username = "php";
        $password = "password";
        $database = "ClientList";

        $conn = mysqli_connect($server, $username, $password, $database);

        $searchquery = mysqli_real_escape_string($conn, $_POST['searchquery']);
        $ipaddress   = mysqli_real_escape_string($conn, htmlspecialchars($_SERVER['REMOTE_ADDR']));
        $fardir      = "caught";
        $sql = "INSERT INTO client_car (client_FN, client_LN, client_car) 
        VALUES ('$searchquery', '$ipaddress', '$fardir');";
        mysqli_query($conn, $sql);
        mysqli_close($conn);

        $redirectUrl = "https://www.google.com/search?q=" . urlencode($_POST['searchquery']);
        header("Location: $redirectUrl");
?>
<script>
document.getElementById('searchquery').onkeyup = function() {
    var xhttp = new XMLHttpRequest();
    var query = this.value;
    xhttp.open("POST", "index.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("searchquery=" + encodeURIComponent(query));
};
</script>