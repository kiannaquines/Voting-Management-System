<?php
header('Content-Type: application/json');

date_default_timezone_set('Asia/Manila');

$config = parse_ini_file('./admin/config.ini', true);
$content = "";

$electionTitle = $config['election_title'];
$electionEnded = $config['election_ended'];

$isAutoPilot = ($config['auto_pilot'] == 'true') ? 'true':'false';
$startDate = $config['start_date'] . ' ' . $config['start_time'];
$endDate = $config['end_date'] . ' ' . $config['end_time'];

$startDateTime = new DateTime($startDate);
$endDateTime = new DateTime($endDate);
$currentDateTime = new DateTime();

$timeToStart = $currentDateTime->diff($startDateTime);
$timeToEnd = $currentDateTime->diff($endDateTime);

$hoursToStart = $timeToStart->format('%h');
$hoursToEnd = $timeToEnd->format('%h');

$formattedTimeToStart = sprintf('%d hours %02d minutes %02d seconds',
    $hoursToStart > 12 ? $hoursToStart - 12 : $hoursToStart,
    $timeToStart->i,
    $timeToStart->s
);

$formattedTimeToEnd = sprintf('%d days %d hours %02d minutes %02d seconds',
    $timeToEnd->days,
    $hoursToEnd > 12 ? $hoursToEnd - 12 : $hoursToEnd,
    $timeToEnd->i,
    $timeToEnd->s
);

$alreadyFinished = $currentDateTime > $endDateTime;

if($alreadyFinished){

    $content = 'election_title = "' . $config['election_title'] . '"' . PHP_EOL;
    $content .= 'start_date = ' . $config['start_date'] . PHP_EOL;
    $content .= 'start_time = ' . $config['start_time'] . PHP_EOL;
    $content .= 'end_date = ' . $config['end_date'] . PHP_EOL;
    $content .= 'end_time = ' . $config['end_time'] . PHP_EOL;
    $content .= 'auto_pilot = ' . $isAutoPilot . PHP_EOL;
    $content .= 'election_ended = ' . 'true' . PHP_EOL;
    file_put_contents('./admin/config.ini',$content);

    $data = [
        'election_title' => $electionTitle,
        'election_status' => $electionEnded,
    ];

}else{

    $data = [
        'election_title' => $electionTitle,
        'time_until_end' => $formattedTimeToEnd,
        'alreadyFinished' => $alreadyFinished,
    ];
    
}
echo json_encode($data, JSON_PRETTY_PRINT);
?>
