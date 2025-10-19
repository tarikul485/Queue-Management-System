<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);
  $file = '../data/clients.json';

  $data['status'] = 'waiting';
  $data['startTime'] = time(); // Add timestamp

  $clients = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
  $clients[] = $data;

  file_put_contents($file, json_encode($clients, JSON_PRETTY_PRINT));
  echo json_encode(['status' => 'success']);
}
?>
