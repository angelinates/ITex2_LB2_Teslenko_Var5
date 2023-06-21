<?php 
require_once "connection.php";

$low_price = $_GET['low_price'];
$top_price = $_GET['top_price'];

$result = $collection->find(['price' => ['$gte' => intval($low_price), '$lte' => intval($top_price)]],['projection' => ['price'=> 1, 'name'=> 1, '_id' => 0]]);

$json = array();
echo "<ul>";
echo "Товари в обраному ціновому діапазоні:";
foreach ($result as $item) {
    array_push($json, $item['price'], $item['name']);
    echo "<li> Ціна: " . $item['price'] . " Назва: " . $item['name'] . "</li>";
}
echo "</ul>";

echo "<script> localStorage.setItem('price','" . json_encode($json) . "');</script>";
?>