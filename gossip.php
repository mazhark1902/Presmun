<?php

header("Access-Control-Allow-Origin: *");
error_reporting(0);
$conn = new mysqli("localhost", "root", "", "presmun");
$data = json_decode(file_get_contents("php://input"));
try {

    if ($data) {
        if (isset($data->reply)) {

            $sql = $conn->prepare("INSERT INTO gossip_child VALUES(NULL, ?, ?, ?, ?)");
            $sql->bind_param('sssd', $data->from, $data->to, $data->message, $data->reply);
            header("content-type: application/json");
            if ($sql->execute()) {
                $id = $conn->insert_id;
                echo '{"success":true, "id": ' . $id . '}';
            } else
                echo '{"success":false}';
            die();
        } else {

            $sql = $conn->prepare("INSERT INTO gossip VALUES(NULL, ?, ?, ?)");
            $sql->bind_param('sss', $data->from, $data->to, $data->message);
            header("content-type: application/json");
            if ($sql->execute()) {
                $id = $conn->insert_id;
                echo '{"success":true, "id": ' . $id . '}';
            } else
                echo '{"success":false}';
            die();
        }
    }

    $q = "SELECT * from gossip";

    $data = $conn->query($q);
    $result = $data->fetch_all();
    header("Content-type: application/json");
    $finalResult = array();
    foreach ($result as $list) {
        $q = "SELECT * from gossip_child WHERE gossip = $list[0]";
        $data = $conn->query($q);
        $result = $data->fetch_all();
        foreach ($result as $comment) {
            if(strlen($comment[1]) == 0){
                
            }
            elseif(strlen($comment[2]) == 0)
            {
                
            }else
            {
            $list['child'][] = $comment;
            }
        }

        $finalResult[] = $list;
    }
    echo json_encode($finalResult);
} catch (Exception $e) {

    echo '{"success":false, "msg": "' . $e->getMessage() . '"}';

}