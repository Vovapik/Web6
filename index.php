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
        <li><a href="page2.php">
          Page 2
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
            <h1>Card examples</h1>
            <div class="photos">
              <img id="photo1" src="card1.jpg" height="270" width="150" alt="Chariot">
              <img id="photo2" src="card2.jpg" height="270" width="150" alt="Hermit">
              <img id="photo3" src="card3.jpg" height="270" width="150" alt="Temperance">
              <img id="photo4" src="card4.jpg" height="270" width="150" alt="Death">
              <img id="photo5" src="card5.jpg" height="270" width="150" alt="Tower">
            </div>
            <p>
              <a href="#" data-target="photo1">Chariot</a> |
              <a href="#" data-target="photo2">Hermit</a> |
              <a href="#" data-target="photo3">Temperance</a> |
              <a href="#" data-target="photo4">Death</a> |
              <a href="#" data-target="photo5">Tower</a>
            </p>
            <form id="userForm">
              <label for="buttonName">Button Name:</label>
              <input type="text" id="buttonName" required>

              <label for="collapseText">Text for Collapsible:</label>
              <textarea id="collapseText" required></textarea>

              <button type="submit" class="btn">Send</button>
            </form>
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
