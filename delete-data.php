<?php
// Get the raw POST data
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody, true);

// Validate input
if (isset($data['index'])) {
    $file = 'data.json';

    if (file_exists($file)) {
        $existingData = json_decode(file_get_contents($file), true);

        // Check if index exists
        if (isset($existingData[$data['index']])) {
            array_splice($existingData, $data['index'], 1);
            file_put_contents($file, json_encode($existingData));

            // Return success response
            http_response_code(200);
            echo json_encode(['message' => 'Data deleted successfully']);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Entry not found']);
        }
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'Data file not found']);
    }
} else {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid input']);
}
?>

