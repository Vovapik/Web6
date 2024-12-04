<?php
// Get the raw POST data
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody, true);

// Validate input
if (isset($data['name']) && isset($data['text'])) {
    $entry = [
        'name' => htmlspecialchars($data['name']),
        'text' => htmlspecialchars($data['text'])
    ];

    // Save the data to a file (or database)
    $file = 'data.json';
    $existingData = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    $existingData[] = $entry;
    file_put_contents($file, json_encode($existingData));

    // Return success response
    http_response_code(200);
    echo json_encode(['message' => 'Data saved successfully']);
} else {
    // Return error response
    http_response_code(400);
    echo json_encode(['message' => 'Invalid input']);
}
?>