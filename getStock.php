<?php 
require_once "connection.php";

$result = $collection->find(['stock' => ['$eq' => 0]],['projection' => ['stock'=> 1, 'name'=> 1, '_id' => 0]]);

$json = array();
echo "<ul>";
echo "Товари що відсутні на складі:";
foreach ($result as $item) {
    array_push($json, $item['stock'], $item['name']);
    echo "<li> Кількість: " . $item['stock'] . " Назва: " . $item['name'] . "</li>";
}
echo "</ul>";

echo "<script> localStorage.setItem('stock','" . json_encode($json) . "');</script>";
?>