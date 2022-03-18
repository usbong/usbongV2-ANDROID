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


//define('BASEPATH', base_url());
define('BASEPATH', "https://store.usbong.ph");
//typically, webroot would be in /var/www/html/
include('/put_this_somewhere_outside_of_web_root/app+server/database.php');

// server info
$server = $db['hostname']; //'mysql10.000webhost.com';
$user = $db['username'];
$pass = $db['password'];
$db = $db['database'];

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);

// show errors (remove this line if on a live site)
mysqli_report(MYSQLI_REPORT_ERROR);
?>
