<?php
$data = json_decode(file_get_contents('php://input'), true);
if ($data) {
  file_put_contents('../data/passwords.json', json_encode($data, JSON_PRETTY_PRINT));
  echo "Passwords saved.";
} else {
  http_response_code(400);
  echo "Invalid data.";
}
?>
