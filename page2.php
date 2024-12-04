<?php
$file = 'data.json';
$data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
?>
<!DOCTYPE html>
<html lang = "en">
<head>
  <title>TAROT FLEX</title>
  <link rel="stylesheet" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="main-header-container">
  <div class="block header" data-id="1">
    <div class="header-box">
      <h1>Tarot</h1>
    </div>
    <h1>TRY AND PEEK INTO THE FUTURE</h1>
  </div>
  <div class="main-container">
    <div class="block left-block" data-id="2">
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
        <area shape="rect" coords="0,0,300,90" href="index.html" alt="Main">
        <area shape="rect" coords="0,90,130,200" href="index.html" alt="Main">
        <area shape="rect" coords="130,90,300,200" href="index.html" alt="Main">
      </map>
    </div>
    <div class="center-right-footer-container">
      <div class="center-right-container">
        <div class="center-content">
          <div class="block center-block" data-id="3">
            <div id="collapsibleContainer">
                <?php if (!empty($data)): ?>
                  <?php foreach ($data as $entry): ?>
                    <button class="btn" type="button" onclick="toggleCollapse('collapse-<?php echo $entry['name']; ?>')">
                      <?php echo $entry['name']; ?>
                    </button>
                    <div id="collapse-<?php echo $entry['name']; ?>" class="collapse">
                      <?php echo $entry['text']; ?>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No components to display.</p>
                <?php endif; ?>
              </div>

              <script>
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
            <div class="block right-block" data-id="4"><h2>What is it?</h2>
                Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
              </div>
              Tarot is a form of divination that uses a deck of specially illustrated cards to gain insight into the past, present, or future. Tarot reading is often associated with spirituality, self-reflection, and guidance, though its uses and interpretations vary widely.</div>
            <div class="block right-block2" data-id="5">
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
      <div class="block footer" data-id="6">
        <div class="footer-box">
          <h1>Tarot</h1>
        </div>
        <h1>UNVEIL THE SECRETS OF FATE</h1>
      </div>
    </div>

  </div>
</div>
<script src="scripts.js"></script>
</body>
</html>