<?php
const HOST_NAME = "localhost";
const DB_NAME = "traversy";
const USER_NAME = "3bod";
const PASSWORD = "0000";

$connection = new mysqli(HOST_NAME , USER_NAME , PASSWORD , DB_NAME );
if ($connection->connect_error){
    die("Connection Error");
}