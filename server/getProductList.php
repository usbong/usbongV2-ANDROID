<?php
/*
 * Copyright 2017~2022 SYSON, MICHAEL B.
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 *  @company: USBONG
 *  @author: SYSON, MICHAEL B.
 *  @date created: 2017
 *  @date updated: 20220318
 *  @website address: http://www.usbong.ph
 *
 *  Note:
 *  1) Put this file in Computer Server 
 *  --> Example: USBONG_STORE_PRODUCTS_LIST_DOWNLOAD = "https://" + HOSTNAME + "/app+server/getProductList.php"; 
 */
 
 //TO-DO: -reuse: to execute UPLOAD image files
 
 
	// connect to the database
	header('Content-Type: application/json');
	include('usbong-store-connect.php');

	$mysqli->set_charset("utf8");
		
/*	
    if (!$mysqli->set_charset("utf8")) {
            printf("Error loading character set utf8: %s\n", $mysqli->error);
    } else {
            printf("Current character set: %s\n", $mysqli->character_set_name());
    }
*/
	// get the records from the database
/*	if ($result = $mysqli->query("SELECT * FROM product"))
*/
	if ($result = $mysqli->query("SELECT * FROM product INNER JOIN product_type ON product.product_type_id=product_type.product_type_id")) 
	{
		// display records if there are records to display
		if ($result->num_rows > 0)
		{
			$responses = array();
		
			while ($row = $result->fetch_object())
			{
				$jsonResponse = array(
						"product_id" => $row->product_id,
						"merchant_id" => $row->merchant_id,
						"product_type_id" => $row->product_type_id,
						"product_type_name" => $row->product_type_name,					
						"name" => $row->name,
						"price" => $row->price,
						"previous_price" => $row->previous_price,
						"language" => $row->language,
						"author" => $row->author,
						"supplier" => $row->supplier,
						"description" => $row->description,
						"image_location" => $row->image_location,
						"format" => $row->format,
						"quantity_in_stock" => $row->quantity_in_stock,
						"translator" => $row->translator,
						"pages" => $row->pages
				);
				$responses[] = $jsonResponse;
				
			}
			echo json_encode($responses);
		}
		// if there are no records in the database, display an alert message
		else
		{
				echo "No results to display!";
		}
	}
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}
	
	// close database connection
	$mysqli->close();
?>
