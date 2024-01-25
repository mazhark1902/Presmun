<?php
header("Access-Control-Allow-Origin: *");
$conn = new mysqli("localhost", "root", "", "presmun");
$q = "SELECT secretariats.name, secretariats.division_id, division.name as d_name, secretariats.sub_division, secretariats.img FROM secretariats INNER JOIN division ON division.id = secretariats.division_id";
$data = $conn->query($q);
$result = $data->fetch_all();
header("Content-type: application/json");
$finalResult = array();
foreach ($result as $list) {
    $finalResult[$list[1]]["d_name"] = $list[2];
    $finalResult[$list[1]]["data"][] = array("name" => $list[0], "sub_division" => $list[3], "img" => $list[4]);
}
echo json_encode($finalResult);