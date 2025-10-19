<?php
header('Content-Type: application/json');

$file = '../data/clients.json';
$clients = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
$now = time();

// Check if the request is for the display page
$isDisplayRequest = isset($_GET['display']) && $_GET['display'] === 'true';

if ($isDisplayRequest) {
    // Filter out "called" tokens older than 5 minutes (300 seconds) for display
    $filteredClients = array_filter($clients, function($client) use ($now) {
        if ($client['status'] === 'called') {
            return isset($client['called_at']) && ($now - $client['called_at'] <= 300);
        }
        return $client['status'] === 'served'; // Optionally include served tokens
    });
} else {
    // Return all clients for other pages
    $filteredClients = $clients;
}

echo json_encode(array_values($filteredClients));
?>
