<?php
require_once '../classes/Pdo_methods';

$pdo = new PdoMethods();

$sql = "SELECT * FROM names";

$records = $pdo->selectNotBinded($sql);

if($records === "error") {
    $response = (object) [
        'masterstatus' => 'error',
        'msg' => 'Could not display names'
    ];
    echo json_encode($response);
} else {
    function output($records){
		$list = '<ol>';
		foreach ($records as $row){
			$list .= "<li>{$row['name']}</li>";
		}
		$list .= '</ol>';
	}
    $response = (object) [
        'masterstatus' => 'success',
        'names' => $list
    ];
    echo json_encode($response);
}

?>
