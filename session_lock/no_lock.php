<?php

ini_set('session.save_path', __DIR__ . '/session');

header('Content-Type: text/plain');

$startTime = microtime(true);
$db = mysqli_init();

$db->options(MYSQLI_INIT_COMMAND, 'SET wait_timeout = 3');
$db->real_connect('p:database', 'root', 'root', 'simulation');

session_name('session_no_lock');
session_start(['read_and_close' => true]);

if (isset($_GET['primer'])) {
    die;
}

$_SESSION['no_lock'] = $startTime;

sleep(2);

$date = date('Y-m-d: H:i:s');

$db->query(sprintf(
    "INSERT INTO session_locking (name, value) VALUES ('%s' ,'%s')",
    $date,
    'not locked'
));

sleep(1);

$db->query(sprintf(
    "SELECT * FROM session_locking WHERE value = '%s'",
    $date
));

echo round(microtime(true) - $startTime, 5) . 's';

$db->close();
