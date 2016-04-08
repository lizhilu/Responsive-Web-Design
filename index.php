<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
      if(isset($_GET["symbol"])){
        $link="http://dev.markitondemand.com/MODApis/Api/v2/Lookup/json?input=".$_GET["symbol"];
        //$data = file_get_contents($link);
        $data="";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
        curl_setopt($ch, CURLOPT_URL, $link);
        $data = curl_exec($ch);
        curl_close($ch);
        //$data = json_decode($data);
        echo $data;
      }
      if(isset($_GET["company1"])){
        $link1="http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol=".$_GET["company1"];
        //$data1 = file_get_contents($link1);
        $data1="";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
        curl_setopt($ch, CURLOPT_URL, $link1);
        $data1 = curl_exec($ch);
        curl_close($ch);
        echo $data1;
      }
      if(isset($_GET["company2"])){
        $link2="http://dev.markitondemand.com/MODApis/Api/v2/InteractiveChart/json?parameters={\"Normalized\":false,\"NumberOfDays\":1095,\"DataPeriod\":\"Day\",\"Elements\":[{\"Symbol\":\"{$_GET["company2"]}\",\"Type\":\"price\",\"Params\":[\"ohlc\"]}]}";
        //$data2 = file_get_contents($link2);
        $data2="";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
        curl_setopt($ch, CURLOPT_URL, $link2);
        $data2 = curl_exec($ch);
        curl_close($ch);
        echo $data2;
      }
      if(isset($_GET["company3"])){
        $accountKey ='YZqwlHU/iT2zF//QJbh45apYEl+cR3GPKRxikZGHjDg';
        $context = stream_context_create(array(
            'http' => array(
            'request_fulluri' => true,
            'header'  => "Authorization: Basic " . base64_encode($accountKey . ":" . $accountKey)
            )
        ));
        $tmp=urlencode($_GET["company3"]);
        $link3="https://api.datamarket.azure.com/Bing/Search/v1/News?Query=%27".$tmp."%27&\$format=json";
        $data3 = file_get_contents($link3,0,$context);
        echo json_encode($data3);
      }
?>
