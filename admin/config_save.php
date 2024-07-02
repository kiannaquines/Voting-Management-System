<?php
include 'includes/session.php';

$return = 'home.php';
if(isset($_GET['return'])){
    $return = $_GET['return'];
}

if(isset($_POST['save'])){
    $title = $_POST['title'] ?? '';
    $startDate = $_POST['startDate'] ?? '';
    $startTime = $_POST['startTime'] ?? '';
    $endDate = $_POST['endDate'] ?? '';
    $endTime = $_POST['endTime'] ?? '';
    $election_ended = $_POST['election_ended'] ?? '';

    $file = 'config.ini';
    $content = 'election_title = "' . addslashes($title) . '"' . PHP_EOL;
    $content .= 'start_date = ' . $startDate . PHP_EOL;
    $content .= 'start_time = ' . $startTime . PHP_EOL;
    $content .= 'end_date = ' . $endDate . PHP_EOL;
    $content .= 'end_time = ' . $endTime . PHP_EOL;
    $content .= 'election_ended = ' . $election_ended . PHP_EOL;

    if(file_put_contents($file, $content) !== false){
        $_SESSION['success'] = 'Election title updated successfully';
    } else {
        $_SESSION['error'] = 'Failed to write to config file';
    }
} else {
    $_SESSION['error'] = "Fill up config form first";
}

header('location: ' . $return);
?>
