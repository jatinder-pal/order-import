<?php 
echo "hello126";
$url = "https://9dd7af7202b9e8c10102d3bf486e1bc3:c249c83bc4641859f72478bae65866ea@wishaddict.myshopify.com/admin/orders.json";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data= curl_exec($ch);
curl_close($ch);
$data=json_decode($data, true);
//echo "<pre>";print_r($data);echo "</pre>";
if($data !=''){
	foreach($data as $data1){
		echo "id=".$data1['orders']['id'];
	/*$ch = curl_init("https://3b4fa03fc3c62dd4bc12df85201806de:826c019d2d1d00f99b3d90682ad58851@jai-shri-ram-2.myshopify.com/admin/orders.json");
	
			$order = array(
			'order' => array(
				
				'line_items' => $line_items,
				// array(
						// array(
							// 'title' => $pname,
							// 'price' => $pprice,
							// 'quantity' => 1,
							// 'variant_id' => $sel_product,
							// 'total_discounts' => 0.00
						// )
						// ),	
				'transactions' => array(
					array(
						'kind' => "authorization",
						'status' => "success",
						'amount' => $pprice
						)
				),
				"financial_status" => "paid",
				'shipping_address' => array(
						'address1' => $shipping_address1,
						'address2' => $shipping_address2,
						'city' => $shipping_city,
						'first_name' => $shipping_first_name,
						'last_name' => $shipping_last_name,
						'zip' => $shipping_zip,
						'country_code' => $shipping_country,
						'phone' =>  $phone,
						'province' =>  $shipping_address['state']
				),
				'billing_address' => array(
						'address1' => $billing_address1,
						'address2' => $billing_address2,
						'first_name' => $billing_first_name,
						'last_name' => $billing_last_name,
						'city' => $billing_city,
						'zip' => $billing_zip,
						'country_code' => $billing_country,
						'province' => $billing_address['state']
				),
				'email' => $email,
			));
	  	
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($order)); 
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch); // close curl session
			//print_r(json_decode($response, true));
			$arr1=json_decode($response, true);
			$arr2=$arr1['order'];
			$_SESSION["orderno"] = $arr2['name'];//Order No Generated
			$ch_stripe = \Stripe\Charge::retrieve($charge->id);
			$ch_stripe->description = "Valra Order".$_SESSION["orderno"];
			$ch_stripe->save();
			if(count($response)>0){
			$kuchbhi = 'SUCCESS';
			}
		} else{
			$kuchbhi = 'ERROR';
		}*/
	}
}
?>
