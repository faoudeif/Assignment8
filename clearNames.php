<?php
require_once '../classes/Pdo_methods.php';

$pdo = new PdoMethods();

$sql = "DELETE FROM names WHERE name = :name";
				
$bindings = [
    [':name', $name, 'str'],
];


$records = $pdo->otherBinded($sql, $bindings);

if($records === "error") {
    $response = (object) [
        'masterstatus' => 'error',
        'msg' => 'Could not delete names'
    ];
    echo json_encode($response);
} else {
    $response = (object) [
        'masterstatus' => 'success',
        'names' => 'All names deleted'
    ];
    echo json_encode($response);
}


?>
