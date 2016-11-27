<?php
$a = rand();
echo "Загаданное число: " . $a . "!<br /><br />";
if (isset($_POST['number'])) {
  $b = (int) $_POST['number'];
  if ($b > $a) {
    echo "<p>Слишком много</p>";
  }
  if ($b < $a) {
      echo "<p>Слишком мало</p>";
  }
  if ($b === $a) {
      echo "<p>Вы угадали</p>";
  }
}
else {
  $number = 0;
}
echo "<p>Вы ввели: ".$b."!</p>";
?>
<form action method="post">
  <input name="number">
  <button>Отправить</button>
</form>
