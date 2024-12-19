<?php
$host = 'mysql.railway.internal';
$dbname = 'railway';
$user = 'root';
$password = 'HuhsPeukULLWWalcIzUSahgjCiLbOwTo';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query("SELECT * FROM entries");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $data = [];
    echo "Database connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <title>LABA6</title>
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="main-header-container">
    <div class="header">
        <div class="header-box">
            <h1>Tarot</h1>
        </div>
        <h1>TRY AND PEEK INTO THE FUTURE</h1>
    </div>
    <div class="main-container">
        <div class="left-block">
            <h1>PORTAL</h1><br>
            <ul>
                <li><a href="index.html">
                        Main
                    </a></li>
                <li><a href="index.html">
                        Main
                    </a></li>
                <li><a href="index.html">
                        Main
                    </a></li>
                <li><a href="index.html">
                        Main
                    </a></li>
                <li><a href="index.html">
                        Main
                    </a></li>
                <li><a href="index.html">
                        Main
                    </a></li>
            </ul>
            <br>
            <img src="map.jpg" height="200" width="300" usemap="#image-map">
            <map name="image-map">
                <area shape="rect" coords="0,0,300,90" href="index.html" alt="History of tarot">
                <area shape="rect" coords="0,90,130,200" href="index.html" alt="Major arcana">
                <area shape="rect" coords="130,90,300,200" href="index.html" alt="Minor arcana">
            </map>
        </div>
        <div class="center-right-footer-container">
            <div class="center-right-container">
                <div class="center-content">
                    <div class="center-block">
                        <div id="collapsibleContainer">
                            <?php if (!empty($data)): ?>
                                <?php foreach ($data as $index => $entry): ?>
    <div class="entry">
        <button class="btn" type="button" onclick="toggleCollapse('collapse-<?php echo $entry['id']; ?>')">
            <?php echo htmlspecialchars($entry['name']); ?>
        </button>
        <div id="collapse-<?php echo $entry['id']; ?>" class="collapse">
            <?php echo htmlspecialchars($entry['text']); ?>
        </div>
        <button class="delete-btn" onclick="deleteEntry(<?php echo $entry['id']; ?>)">Delete</button>
    </div>
<?php endforeach; ?>
                            <?php else: ?>
                                <p>No components to display.</p>
                            <?php endif; ?>
                        </div>

                        <script>
                            async function deleteEntry(id) {
    if (confirm('Are you sure you want to delete this entry?')) {
        const response = await fetch('/delete-data.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id }), // Send the correct `id`
        });

        if (response.ok) {
            alert('Deleted successfully');
            location.reload(); // Refresh the page to show updated data
        } else {
            const error = await response.json();
            alert(error.message || 'Failed to delete data.');
        }
    }
}

                            function toggleCollapse(id) {
                                const element = document.getElementById(id);
                                if (element.classList.contains('show')) {
                                    element.classList.remove('show');
                                } else {
                                    element.classList.add('show');
                                }
                            }
                        </script>
                    </div>
                    <div class="right-container">
                        <div class="right-block"><h2>What is it?</h2>
                            Tarot is a form of divination that uses a deck of specially illustrated cards to gain insight into the past, present, or future. Tarot reading is often associated with spirituality, self-reflection, and guidance, though its uses and interpretations vary widely.</div>
                        <div class="right-block">
                            A traditional tarot deck consists of 78 cards, divided into two main sections:
                            <ul style="margin-left: 20px;">
                                <li>
                                    Major Arcana (22 cards):
                                    <br>
                                    Represents significant life events, spiritual lessons, and archetypes.
                                </li>
                                <li>
                                    Minor Arcana (56 cards):
                                    Focuses on everyday life and practical matters.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="footer-box">
                    <h1>Tarot</h1>
                </div>
                <h1>UNVEIL THE SECRETS OF FATE</h1>
            </div>
        </div>

    </div>
</div>

<script src="script1.js"></script>

</body>
</html>


