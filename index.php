<?php 
echo "hello123";
if(isset($_REQUEST['submit'])){
	echo $page_no= $_REQUEST['page_no'];
	$url = "https://9dd7af7202b9e8c10102d3bf486e1bc3:c249c83bc4641859f72478bae65866ea@wishaddict.myshopify.com/admin/orders.json?page=".$page_no."limit=250";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$data= curl_exec($ch);
	curl_close($ch);
	$data=json_decode($data, true);
	//echo "<pre>";print_r($data);echo "</pre>";
	$i=1;
	if($data !=''){
		foreach($data['orders'] as $data1){
		//if($i==1)	{
		  $order_id=$data1['id'];
		//$ch = curl_init("https://3b4fa03fc3c62dd4bc12df85201806de:826c019d2d1d00f99b3d90682ad58851@jai-shri-ram-2.myshopify.com/admin/orders.json");
		$ch = curl_init("https://5f43e0b03c04fca40fd4c3798ee017b9:da3170e439ebd7324cbfb50a6c866c44@wishaddict1.myshopify.com/admin/orders.json");
		$line_items1=array();
		$line_count=0;
		 foreach($data1['line_items'] as $line_items){
		   $line_items1[$line_count]=
					array(
						'title' =>$line_items['title'],
						'price' => $line_items['price'],
						'quantity' =>$line_items['quantity'],
						'variant_id' => $line_items['variant_id'],
						'variant_title' => $line_items['variant_title'],
						'vendor' => $line_items['vendor'],
						'fulfillment_service' => $line_items['fulfillment_service'],
						'name' => $line_items['name'],
					);
			$line_count++;		
		 }
		 echo "<pre>";print_r($line_items1);echo "</pre>";
				$order = array(
				'order' => array(
					'line_items' => $line_items1,
					'transactions' => array(
						array(
							'kind' => "authorization",
							'status' => "success",
							'amount' => 400
							)
					),
					"tags" => ' Import order',
					"note" => $data1['note'],
					"token" => $data1['token'],
					"gateway" => $data1['gateway'],
					"total_price" => $data1['total_price'],
					"subtotal_price" => $data1['subtotal_price'],
					"total_weight" => $data1['total_weight'],
					"total_tax" => $data1['total_tax'],
					"taxes_included" => $data1['taxes_included'],
					"currency" => $data1['currency'],
					"financial_status" => $data1['financial_status'],
					"confirmed" => $data1['confirmed'],
					"total_discounts" => $data1['total_discounts'],
					"total_line_items_price" => $data1['total_line_items_price'],
					"cart_token" => $data1['cart_token'],
					"buyer_accepts_marketing" => $data1['buyer_accepts_marketing'],
					"referring_site" => $data1['referring_site'],
					"cancelled_at" => $data1['cancelled_at'],
					"cancel_reason" => $data1['cancel_reason'],
					"total_price_usd" => $data1['total_price_usd'],
					"checkout_token" => $data1['checkout_token'],
					"payment_gateway_names" => $data1['payment_gateway_names'][0],
					"processing_method" => $data1['processing_method'],
					/*'tax_lines' => array(
							'title' => $data1['tax_lines']['title'],
							'price' => $data1['tax_lines']['price'],
							'rate' => $data1['tax_lines']['rate']
							
					),*/
					'shipping_address' => array(
							'address1' => $data1['shipping_address']['address1'],
							'address2' => $data1['shipping_address']['address2'],
							'city' =>$data1['shipping_address']['city'],
							'first_name' =>$data1['shipping_address']['first_name'],
							'last_name' => $data1['shipping_address']['last_name'],
							'zip' => $data1['shipping_address']['zip'],
							'country_code' =>$data1['shipping_address']['country'],
							'phone' => $data1['shipping_address']['phone'],
							'province' =>  $data1['shipping_address']['province']
					),
					'billing_address' => array(
							'address1' => $data1['billing_address']['address1'],
							'address2' => $data1['billing_address']['address2'],
							'city' =>$data1['billing_address']['city'],
							'first_name' =>$data1['billing_address']['first_name'],
							'last_name' => $data1['billing_address']['last_name'],
							'zip' => $data1['billing_address']['zip'],
							'country_code' =>$data1['billing_address']['country'],
							'phone' => $data1['billing_address']['phone'],
							'province' =>  $data1['billing_address']['province']
					),
					'email' =>$data1['email'],
				));
				  print_r($order);
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($order)); 
				curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($ch);
				curl_close($ch); // close curl session
				//print_r(json_decode($response, true));
				if(count($response)>0){
				echo 'SUCCESS';
				}
			 else{
				echo 'ERROR';
			}
			$i++;
		// }
		
		}	
	}
}
?>
<html>
<body>
<form name="page_limit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<select name="page_no">
<?php for($i=1;$i<=191;$i++){
	echo '<option>'.$i.'</option>';
}
?>
</select>
<input type="submit" value="submit" name="submit">
</form>
</body>
</html>
