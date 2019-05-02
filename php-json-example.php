<?php

// collect data to send
$variables = [
    'first_name' => 'Wayne', // investor info
    'last_name' => 'Rooney',
    'business_name' => '',
    'business_number' => '',
    'dob' => '1975-09-10',
    'investor_email' => '',
    'joint_first_name' => 'Justine',
    'joint_last_name' => 'Welham',
    'joint_email' => 'join@example.com',
    'address_line_1' => '5029 Avenue Laurier',
    'address_line_2' => '',
    'city' => 'Sherbrooke',
    'state' => 'QC',
    'zip' => 'H2H 3D1',
    'country' => 'CA',  //country code
    'bank_address_line_1' => '',
    'bank_number' => '',
    'bank_account' => '',
    'bank_name' => '',
    'bank_transit' => '',
    'phone' => '4360949093',
    'trust_company' => 'ComputerShare', // account info
    'plan_number' => '',
    'account_type' => 'RRSP',
    'account_document' => '', // base64_encode(file_get_contents('path/to/account_document.pdf'));
    'trade_number' => '',
    'class' => '',
    'series' => '',
    'drip' => '', // 0/1
    'dealer' => 'Example EMD',
    'representative' => 'James Smith',
    'representative_email' => 'james@passiosoft.com',
    'fund' => 'Example Fund',
    'currency' => 'CAD',
    'account_date' => '2017-11-23',
    'price' => '10.00', // transaction info
    'units' => '5000',
    'description' => '',
    'closing_date' => '2017-11-23',
    'transaction_document' => '' // base64_encode(file_get_contents('path/to/transaction_document.pdf'));
    
    
    
 ];



$curl = curl_init();


$variables_string = http_build_query($variables);


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://sandbox.passiosoft.com/api/account",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POST => count($variables),
  CURLOPT_POSTFIELDS => $variables_string,
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer *****************************",
    "cache-control: no-cache",
    "accept: application/json",
    "Content-Type: application/json",
    "X-Requested-With: XMLHttpRequest",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
