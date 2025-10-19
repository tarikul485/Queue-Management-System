<?php
// Path to client storage
$file = '../data/clients.json';

// Clear the file
file_put_contents($file, json_encode([], JSON_PRETTY_PRINT));

echo "Reset done.";
?>

