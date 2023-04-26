<?php
// replace the "demo" apikey below with your own key from https://www.alphavantage.co/support/#api-key
$json = file_get_contents('https://www.alphavantage.co/query?function=NEWS_SENTIMENT&apikey=NLAGECMMWONN3V1X');

file_put_contents("data.json",$json);

?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="../Resources/styles.css" />
    <link rel="stylesheet" href="../Resources/MarketNews.css" />
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-3.6.0.min.js"
    ></script>
    <script type="text/javascript" src="../Scripts/MarketNews.js"></script>
  </head>
  <nav id="NavBar">
    <div id="NavBar_Left">
      <a href="../index.html">MarketFi</a>
    </div>
    <div id="NavBar_Center">
      <a>About</a>
      <a href = "index.php">Markets</a>
      <a href = "../index.html#Features">Features</a>
      <a>Resources</a>
      <a href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ">Pricing</a>
      <a href = ../Learn/learn.html>Learn</a>
    </div>
    <div id="NavBar_Right">
      <a>Sign in</a>
      <button id="SignOn">
        <a href="../SignUp/CollectInfo.html" class="ButtonAnchor">Sign Up</a>
      </button>
    </div>
  </nav>
  <body>
    <h1>In The <em>News</em></h1>
    <div id="MarketNews"></div>
  </body>
</html>

