<?php

header("Content-Type: application/json");
$input = @file_get_contents("php://input");
$data = json_decode($input, true);

if (empty($data) || empty($data['operation_type']) || empty($data['x']) || empty($data['y']))
{
    // $returnArr = array("errorCode" => "400", "status" => "false", "ResponseMsg" => "Something Went Wrong!");
    $returnArr = array("slackUsername" => "isaacojerumu", "result" => 0, "operation_type" => $data['operation_type']);
} else
{
    $r_type = $data['operation_type'];
    $r_x = $data['x'];
    $r_y = $data['y'];

    switch ($r_type) {
        case 'addition':
            $result = $r_x + $r_y;
            break;
        case 'substraction':
            $result = $r_x - $r_y;
            break;
        case 'multiplication':
            $result = $r_x * $r_y;
            break;
        default:
        $result = 0;
    }

    $returnArr = array("slackUsername" => "isaacojerumu", "result" => $result, "operation_type" => $r_type,);
}

echo json_encode($returnArr);
