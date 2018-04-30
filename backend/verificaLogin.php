<?php

session_start();
if (!isset($_SESSION['login'])) {
    die(header("HTTP/1.0 404 Not Found")); //Throw an error on failure
}
