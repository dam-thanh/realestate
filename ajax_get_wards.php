<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config2.php");
$district_id = $_GET['district_id'];

// echo $district_id;

$sql = "SELECT * FROM `wards` WHERE `district_id` = {$district_id}";
$result = mysqli_query($conn, $sql);


$data[0] = [
    'id' => null,
    'name' => 'Chọn một xã/phường'
];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'id' => $row['wards_id'],
        'name' => $row['wards_name']
    ];
}
echo json_encode($data);
