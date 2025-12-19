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
    ?><br>
    <p>Your IP address has been recorded.</p>

</body>
</html>