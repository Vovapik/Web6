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

if (isset($data['name']) && isset($data['text'])) {
    $name = htmlspecialchars($data['name']);
    $text = htmlspecialchars($data['text']);

    try {
        $stmt = $pdo->prepare("INSERT INTO entries (name, text) VALUES (:name, :text)");
        $stmt->execute(['name' => $name, 'text' => $text]);
        http_response_code(200);
        echo json_encode(['message' => 'Data saved successfully']);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['message' => 'Failed to save data: ' . $e->getMessage()]);
    }
} else {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid input']);
}
?>
