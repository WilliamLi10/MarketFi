<?php
// replace the "demo" apikey below with your own key from https://www.alphavantage.co/support/#api-key
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(!empty($_POST['stockName'])){
    file_put_contents('data.json', '');
    $all_data = array();
    for($i = 0; $i < count($_POST['stockName']); ++$i){
      $equity = $_POST['stockName'][$i];
      $API_key = 'NLAGECMMWONN3V1X';
      $json = file_get_contents(sprintf('https://www.alphavantage.co/query?function=TIME_SERIES_WEEKLY&symbol=%s&apikey=%s',$equity,$API_key));
      $data = json_decode($json,true);
      $filtered_data = array();
      foreach ($data['Weekly Time Series'] as $date => $entry) {
 
        $entry_date = strtotime($date);
        $end_date = strtotime('2022-01-01');
        if ($entry_date <  $end_date) {
          break;
        } else{
          $filtered_data[$date] = $entry;
        }
      }
      $all_data[$equity] = $filtered_data;  
    }
    file_put_contents('data.json',json_encode($all_data),FILE_APPEND);
  }
  
  header('Location: display.html');

}

exit;
?>