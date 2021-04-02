<?php
require_once '../classes/Pdo_methods.php';

    
$output = "";
$data = json_decode($_POST['data']);

$name = $data->name;

$nameArr = explode(" ", $name);

$name  = "{$nameArr[1]}, {$nameArr[0]}";

$pdo = new PdoMethods();

$sql = "INSERT INTO names (name) VALUES (:name)";

$bindings = [
    [':name', $name, 'str'],
];

$records = $pdo->otherBinded($sql, $bindings);

if($records === "error") {
    $response = (object) [
        'masterstatus' => 'error',
        'msg' => 'Could not insert data into database'
    ];
    echo json_encode($response);
} else {
    $response = (object) [
        'masterstatus' => 'success',
        'msg' => 'Name has been added'
    ];
    echo json_encode($response);
}


?>
