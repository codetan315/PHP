<?php
session_start();

$seats = file('./seatfile/seat.txt', FILE_IGNORE_NEW_LINES);

$col = 0;

if (!isset($_SESSION['col'])){
  $col = 6;
} else if (!preg_match('/^[0-9]{1,5}$/', $_SESSION['col']) || $_SESSION['col'] <= 0) {
  unset($_SESSION['col']);
} else if (preg_match('/^[0-9]{1,5}$/', $_SESSION['col'])) {
  $col = $_SESSION['col'];
  shuffle($seats);
}

if (count($seats) % $col == 0) {
  $row = count($seats) / $col;
} else {
  $row = (count($seats) / $col) + 1;
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Shuffle Seats</title>
    <link rel="stylesheet" href="list.css">
  </head>
  <body>
    <div class="header">
      <h1>Shuffle Seats</h1>
      <form action="shuffle.php" method="post">
        <ruby>
        <label>COL</label>
        <input id="col" type="number" name="col" value="<?= $col ?>" min="1" max="<?= count($seats); ?>">
        <rt>Input Number of columns</rt>
        </ruby>
        <button id="shuffle" type="submit">Shuffle</button>
      </form>
      <div id="box_download">
        <a id="download" href="download.php"><img id="downloadImg" src="./img/download.svg"> download</a>
      </div>
    </div>
    <table>
      <?php for ($i = 1; $i <= $row; $i++) { ?>
        <tr>
        <?php for ($j = 0; $j < $col; $j++) { ?>
          <td><?= $seats[$i*$col-($col-$j)] ?></td>
          <?php if ($i*$col-($col-$j) == count($seats) - 1) {
            break;
          } ?>
        <?php } ?>
        </tr>
      <?php } ?>
    </table>
    <div class="footer">
      <form enctype="multipart/form-data" action="upload.php" method="post">
        <input id="selectfile" type="file" name="seatFile">
        <button id="upload" type="submit"><img id="uploadImg" src="./img/download.svg"> upload</button>
      </form>
    </div>
  </body>
</html>
