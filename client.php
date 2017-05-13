<?php
// include db handler
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
if (isset($_POST['tag']) && $_POST['tag'] != '') {
    // get tag
    $tag = $_POST['tag'];
    // response Array
    $response = array("tag" => $tag, "error" => FALSE);
    // check for tag type
    /*************************************************************************************************/
    if ($tag == 'get_events') {
            // user is already existed
            $event = $db->GetEvents();
            if ($event) {
                $response["error"] = FALSE;
                $response["event"] = $event;
                echo json_encode($response);
            } else {
                // user failed to store
                $response["error"] = TRUE;
                $response["error_msg"] = "some error";
                echo json_encode($response);
            }
    } else {
        // unknown post's tag
        $response["error"] = TRUE;
        $response["error_msg"] = "unknown tag";
        echo json_encode($response);
    }
} else {
    // there isn't any post's tag
    $response["error"] = TRUE;
    $response["error_msg"] = "no tag";
    echo json_encode($response);
}