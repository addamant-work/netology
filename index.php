<?php
$a = rand();
echo "Загаданное число: " . $a . "!<br /><br />";
if (isset($_POST['number'])) {
  $b = (int) $_POST['number'];
  if ($b > $a) {
    exit ("<p>Слишком много!</p>");
  }
  if ($b < $a) {
    exit ("<p>Слишком мало!</p>");
  }
  if ($b === $a) {
    echo "<p>Вы угадали</p>";
  }
}
else {
  $number = NULL;
}
?>
<form action method="post">
  <input name="number">
  <button>Совпало?!</button>
</form>
