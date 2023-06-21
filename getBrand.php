<?php 
require_once "connection.php";

$result = $collection->find([],['projection' => ['brand'=> 1, '_id' => 0]]);

$json = array();
echo "<ul>";
echo "Всі бренди:";
foreach ($result as $item) {
    array_push($json, $item['brand']);
    echo "<li>" . $item['brand'] . "</li>";
}
echo "</ul>";

echo "<script> localStorage.setItem('brand','" . json_encode($json) . "');</script>";
?>