<?php
session_start();

$col = $_POST['col'];
if (preg_match('/^[0-9]{1,5}$/', $col) && $col > 0) {
  $_SESSION['col'] = $col;
}

header('Location: ./list.php');
