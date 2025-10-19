<?php
$file = '../data/clients.json';
$clients = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$today = date('Y-m-d');
$filename = "../data/clients_$today.txt";

$clientData = [];
foreach ($clients as $client) {
    $clientData[] = implode(',', [$client['token'], $client['name'], $client['service'], $client['room'], $client['status']]);
}

file_put_contents($filename, implode("\n", $clientData));

echo "Client data saved for $today.";
?>
