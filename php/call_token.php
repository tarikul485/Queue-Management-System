<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input = json_decode(file_get_contents('php://input'), true);
  $token = $input['token'];
  $room = $input['room'];

  $file = '../data/clients.json';
  $clients = json_decode(file_get_contents($file), true);

  foreach ($clients as &$client) {
    if ($client['token'] === $token && $client['room'] === $room) {
      $client['status'] = 'called';
      $client['called_at'] = time(); // Update call timestamp
      break;
    }
  }

  file_put_contents($file, json_encode($clients, JSON_PRETTY_PRINT));
  echo json_encode(['status' => 'success']);
}
?>
