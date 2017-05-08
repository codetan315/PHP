<?php
$fpath = './seatfile/seat.txt';

if (file_exists($fpath)) {
  header('Content-Description: File Transfer');
  header('Content-Type: application/force-download');
  header('Content-Disposition: attachment; filename="'.basename($fpath).'"');
  readfile($fpath);
  exit;
} else {
  header('Location: ./list.php');
}
