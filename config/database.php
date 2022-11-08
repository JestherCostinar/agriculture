<?php 
session_start();
ob_end_clean();
ob_start();
date_default_timezone_set('Asia/Manila');
$db = new mysqli('localhost','root','','u904449962_agriculture');
// $db = new mysqli('localhost','u904449962_agriculture','@passworD1234','u904449962_agriculture');
// error_reporting(0);