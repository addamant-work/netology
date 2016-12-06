<?php

/*Фирмируем массив*/
$arrayCountryAnimals = array(
    'America' => array('Mammuthus columbi', 'Grizzly bear'),
    'Ausralia' => array('Nematomorpha', 'Orthonectida', 'Rhombozoa'),
    'Russia' => array('Chordata', 'Moschus moschiferus'),
    'Canada' => array('Gnathostomulida', 'Acanthocephala'),
    'China' => array('Nematomorpha', 'Tardigrada', 'Ectoprocta'),
    'Turke' => array('Annelida', 'Annelida columbi'),
);

var_dump($arrayCountryAnimals);

/*Собираем в новый массив животных в названии которых есть пробел*/
$arrayNewCountryAnimals = array();
foreach ($arrayCountryAnimals as $country => $animals) {
  foreach ($animals as $animal) {
    if (mb_substr_count($animal, ' ')) {
      $arrayNewCountryAnimals[] = $animal;
    }
  }
}

var_dump($arrayNewCountryAnimals);

/*Формируем массив их слов входящих в значения массива $arrayNewCountryAnimals*/
$words = array();
foreach ($arrayNewCountryAnimals as $animal) {
  $words = array_merge($words, explode(' ', $animal));
}


var_dump($words);

/*формируем новый массив. значения массива - новые животные*/
$crossedAnimals = array();
while (count($words)) {
  $rnd = rand(0, count($words) - 1);
  $animal = $words[$rnd];
  unset($words[$rnd]);
  $words = array_values($words);

  if (count($words)) {
    $rnd = rand(0, count($words) - 1);
    $animal .= ' ' . $words[$rnd];
    unset($words[$rnd]);
    $words = array_values($words);
  }
  $crossedAnimals[] = $animal;
}

var_dump($crossedAnimals);