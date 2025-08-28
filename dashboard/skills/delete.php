<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $username = 'root';
        $hostname = 'localhost:3307';
        $password = '';
        $db = 'portfolio';

        $connection = new mysqli($hostname, $username, $password, $db);
        $sql = "DELETE FROM skills WHERE id=$id";
        $connection->query($sql);
    }
}
header('location: ./index.php');
