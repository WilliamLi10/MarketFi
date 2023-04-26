<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $all_data = json_decode(file_get_contents("data.json"), true);
    if(!empty($_POST['addStock'])){
        $equity = $_POST['addStock'];
        $API_key = 'NLAGECMMWONN3V1X';
        $json = file_get_contents(sprintf('https://www.alphavantage.co/query?function=TIME_SERIES_WEEKLY&symbol=%s&apikey=%s',$equity,$API_key));
        $filtered_data = array();
        $data = json_decode($json,true);
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
    file_put_contents('data.json',json_encode($all_data));
    
    
      }
  header('Location: display.html');

?>