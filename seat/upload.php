<?php
$uploadDir = './seatfile/';
$uploadFile = $_FILES['seatFile']['tmp_name'];

move_uploaded_file($uploadFile, "$uploadDir/seat.txt");

header('Location: ./list.php');
