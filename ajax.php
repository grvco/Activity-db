<?php
$db = new mysqli("127.0.0.1", "root", "root", "abase");

switch ($_POST["action"]) {
    case 'add-before':
        $activity = $_POST["activity"];
        $expected = $_POST["expected"];
        $priority = $_POST["priority"];
        $query = $db->query("INSERT INTO abase (activity, expected_time, priority, date) VALUES ('$activity', '$expected', '$priority', CURRENT_TIMESTAMP())");
        if($query){
            exit("OK");
        }else{
            exit($db->error);
        }
        break;
        case 'add-after':
            $allocated = $_POST["allocated"];
            $wages = $_POST["wages"];
            $hourly = $wages / ($allocated / 60);
            $id = $_POST["activity"];
            $query = $db->query("UPDATE abase SET allocated_time = '$allocated', hourly = '$hourly', wages = '$wages' WHERE id = '$id'");

            if($query){
                exit("OK");
            }else{
                exit($db->error);
            }
            break;
            case 'edit':
                $allocated = $_POST["allocatedEdit"];
                $expected = $_POST["expectedEdit"];
                $wages = $_POST["wagesEdit"];
                $hourly = $wages / ($allocated / 60);
                $activity = $_POST["activityEdit"];
                $priority = $_POST["priorityEdit"];
                $id = $_POST["id"];
                $query = $db->query("UPDATE abase SET allocated_time = '$allocated', hourly = '$hourly', wages = '$wages', expected_time = '$expected', priority = '$priority', activity = '$activity' WHERE id = '$id'");
    
                if($query){
                    exit("OK");
                }else{
                    exit($db->error);
                }
                break;
    
    default:

    break;
}
?>
