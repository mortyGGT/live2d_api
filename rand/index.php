<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization");

isset($_GET['id']) ? $modelId = (int)$_GET['id'] : exit('error');

require '../tools/modelList.php';
require '../tools/jsonCompatible.php';

$modelList = new modelList();
$jsonCompatible = new jsonCompatible();

$modelList = $modelList->get_list();

$modelRandNewId = true;
while ($modelRandNewId) {
    $modelRandId = rand(0, count($modelList['models'])-1)+1;
    $modelRandNewId = $modelRandId == $modelId ? true : false;
}

header("Content-type: application/json");
echo $jsonCompatible->json_encode(array('model' => array(
    'id' => $modelRandId,
    'name' => $modelList['models'][$modelRandId-1],
    'message' => $modelList['messages'][$modelRandId-1]
)));
