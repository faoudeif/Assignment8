<?php
require_once '../classes/Pdo_methods.php';

$pdo = new PdoMethods();

$sql = "SELECT * FROM names";

$records = $pdo->selectNotBinded($sql);

foreach($records as $row) {
    $names = "<p>" . $row['name'] . "</p>";
}

$response = (object) [
    'masterstatus' => 'success',
    'names' => $names
];
echo json_encode($response);

?>
