<?php
$host = 'mysql.railway.internal';
$dbname = 'railway';
$user = 'root';
$password = 'HuhsPeukULLWWalcIzUSahgjCiLbOwTo';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['message' => 'Database connection failed: ' . $e->getMessage()]);
    exit();
}

$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody, true);

if (isset($data['index'])) {
    $id = intval($data['index']); 

    try {
        $stmt = $pdo->prepare("DELETE FROM entries WHERE id = :id");
        $stmt->execute(['id' => $id]);

        if ($stmt->rowCount() > 0) {
            http_response_code(200);
            echo json_encode(['message' => 'Data deleted successfully']);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Entry not found']);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['message' => 'Failed to delete data: ' . $e->getMessage()]);
    }
} else {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid input']);
}
?>

