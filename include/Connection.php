<?php
$db = new mysqli("localhost", "root", "", "laundry");
if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}
?>
