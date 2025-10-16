




<?php


/*a) The code above connects to your MySQL database and returns a mysqli object that can
be used later to run queries.
b) You should include your own MySQL username, password and database name (the latter
is usually “db” + your student number.
c) The “if” blocks lets you know if an error has occurred (for example, your MySQL login
details are wrong)*/



$mysqli = new mysqli("localhost","2407655","81ipi2","db2407655");
if ($mysqli -> connect_errno) {
    
echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
exit();
}
?>

