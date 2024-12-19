<?php
// Get the raw POST data
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody, true);

// Debugging log: Check received data
file_put_contents('debug.log', print_r($data, true), FILE_APPEND);

// Validate input
if (isset($data['id'])) {
    $id = intval($data['id']); // Ensure the ID is an integer

    // Database connection setup (update with your credentials)
    $host = 'mysql.railway.internal';
$dbname = 'railway';
$user = 'root';
$password = 'HuhsPeukULLWWalcIzUSahgjCiLbOwTo';

    try {
        // Establish database connection
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the DELETE query
        $stmt = $pdo->prepare("DELETE FROM entries WHERE id = :id");
        $stmt->execute(['id' => $id]);

        // Check if a record was deleted
        if ($stmt->rowCount() > 0) {
            // Successfully deleted
            http_response_code(200);
            echo json_encode(['message' => 'Data deleted successfully']);
        } else {
            // ID not found in the database
            http_response_code(404);
            echo json_encode(['message' => 'Entry not found']);
        }
    } catch (PDOException $e) {
        // Handle database connection or query errors
        http_response_code(500);
        echo json_encode(['message' => 'Failed to delete data: ' . $e->getMessage()]);
    }
} else {
    // Invalid input received
    http_response_code(400);
    echo json_encode(['message' => 'Invalid input']);
}
?>

