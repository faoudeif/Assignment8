<?php
require_once '../classes/Pdo_methods.php';

$pdo = new PdoMethods();

$sql = "SELECT * FROM names ORDER BY name";

$records = $pdo->selectNotBinded($sql);

$names = "<p>";
foreach($records as $row) {
$names .= "<p>" . $row['name'] . "</p>";
}
$names .= "</p>";

$response = (object) [
    'masterstatus' => 'success',
    'names' => $names
];

echo json_encode($response);

?>
