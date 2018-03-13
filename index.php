<?php 
echo "hello";
$url = "https://3b4fa03fc3c62dd4bc12df85201806de:826c019d2d1d00f99b3d90682ad58851@jai-shri-ram-2.myshopify.com/admin/orders.json";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data= curl_exec($ch);
curl_close($ch);
$data=json_decode($data, true);
echo "<pre>";print_r($data);echo "</pre>";
?>
