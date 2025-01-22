<?php
include("../config.php");
session_start();

if (!isset($_SESSION['usermail']) || empty($_SESSION['usermail']) || $_SESSION['user_type'] !== 'user') {
    header("Location: ../login.php");
    exit();
}

$usermail = $_SESSION['usermail'];

$sql = "SELECT Name, Email, Phone, NIC, Reg_no, Academic_year, Programme, Member_type, Address FROM member";
$result = mysqli_query($conn,$sql);
$member_record = array();

while($rows = mysqli_fetch_assoc($result)){
    $member_record[] = $rows;
}

if(isset($_POST["exportexcel"]))
{
    $filename = "aasict_member_data_".date('Ymd') .".xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $show_coloumn = false;
    if(!empty($member_record)){
        foreach($member_record as $record){
            if(!$show_coloumn){
                echo implode("\t",array_keys($record)) . "\n";
                $show_coloumn = true;
            }
            echo implode("\t", array_values($record)) . "\n";
        }
    }
    exit;
}
?>