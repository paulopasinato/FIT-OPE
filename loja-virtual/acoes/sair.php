<?php 
require "../config.php";
session_destroy();
header("Location:".BASE_URL);