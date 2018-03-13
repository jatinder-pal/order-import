<?php 
echo "hello";
$url = "https://9dd7af7202b9e8c10102d3bf486e1bc3:c249c83bc4641859f72478bae65866ea@wishaddict.myshopify.com/admin/orders.json";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data= curl_exec($ch);
curl_close($ch);
$data=json_decode($data, true);
echo "<pre>";print_r($data);echo "</pre>";
?>
