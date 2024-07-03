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
$modelSwitchId = $modelId + 1;
if (!isset($modelList['models'][$modelSwitchId-1])) $modelSwitchId = 1;

header("Content-type: application/json");
echo $jsonCompatible->json_encode(array('model' => array(
    'id' => $modelSwitchId,
    'name' => $modelList['models'][$modelSwitchId-1],
    'message' => $modelList['messages'][$modelSwitchId-1]
)));
