<?php
// replace the "demo" apikey below with your own key from https://www.alphavantage.co/support/#api-key
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(!empty($_POST['stockLookup'])){
    file_put_contents('data.json', '');
    $equity = $_POST['stockLookup'];
    $API_key = 'NLAGECMMWONN3V1X';
    $json = file_get_contents(sprintf('https://www.alphavantage.co/query?function=OVERVIEW&symbol=%s&apikey=%s',$equity,$API_key));
    $data = json_decode($json,true);
    echo "<html lang='en'>
    <head>
      <meta charset='UTF-8' />
      <meta name='viewport' content='width=device-width, initial-scale=1.0' />
      <title>Sign Up</title>
      <link rel='stylesheet' href='../../Resources/styles.css' />
      <link rel='stylesheet' href='../../Resources/StockLookup.css' />
    </head>
    <nav id='NavBar'>
      <div id='NavBar_Left'>
        <a href='../display.html'>MarketFi</a>
      </div>
      <div id='NavBar_Center'>
        <a>About</a>
        <a href='../../MarketNews/'>News</a>
        <a>Features</a>
        <a>Resources</a>
        <a>Pricing</a>
        <a>Learn</a>
      </div>
      <div id='NavBar_Right'>
        <form action='StockLookup.php' method='post'>
          <input type='text' name = 'stockLookup' placeholder='Search..' />
        </form>
      </div>
    </nav>
    <body>
      <div id='StockDesc'>
        <div id='CompanyInfo'>";
    echo " <h1><em>" . $data["Symbol"] . "</em></h1>";
    echo "<h2>" . $data["Name"] . "</h2>";
    echo "<p>" . $data["Description"] . "</p>
    <form id='BuyStockForm' action='../addStock.php' method='post'>
      <input type='hidden' name='addStock' value='" . $equity .  "'/>
      <button type='submit'>Buy Stock</button>
    </form>
    </div><table id='CompanyStats'>";
    foreach($data as $key => $value) {
      if (($key != "Symbol" && $key != "Description" && $key != "Name") ){
        echo sprintf("<tr> <th> %s</th> <td>%s</td> </tr>",$key,$value);
      }
    }
    echo "</table></div></body></html>";
    
  }
}
    
?>