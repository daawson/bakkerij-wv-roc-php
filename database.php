<?php
    $host = 'localhost';
    $port = '3306';
    $user = 'root';
    $pass = '';
    $db = 'school';
    $dbh = new PDO('mysql:host='.$host.';dbname='.$db.';port='.$port, $user, $pass);