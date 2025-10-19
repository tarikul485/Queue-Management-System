<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $update = json_decode(file_get_contents('php://input'), true);
  $file = '../data/clients.json';
  $clients = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

  foreach ($clients as &$client) {
    if ($client['token'] === $update['token']) {
      $client[$update['field']] = $update['value'];
      if ($update['field'] === 'status' && $update['value'] === 'served') {
        $client['endTime'] = time(); // add endTime on served
      }
    }
  }

  file_put_contents($file, json_encode($clients, JSON_PRETTY_PRINT));
  echo json_encode(['status' => 'updated']);
}
?>
