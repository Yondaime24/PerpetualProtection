<?php
//1. Import the PayPal SDK client
namespace Sample;
require __DIR__ . '/vendor/autoload.php';
include('../../functions/functions.php');
use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
require 'paypal-client.php';
$orderID = $_GET['orderID'];
class GetOrder
{
  // 2. Set up your server to receive a call from the client
  public static function getOrder($orderId)
  {

    // 3. Call PayPal to get the transaction details
    $client = PayPalClient::client();
    $response = $client->execute(new OrdersGetRequest($orderId));

      // 4. Specify which information you want from the transaction details. For example:
//   $orderID = $response->result->id;
//   $email = $response->result->payer->email_address;
//   $name = $response->result->purchase_units[0]->shipping->name->full_name;
//   $paidamount = $response->result->purchase_units[0]->amount->value;
//   $address1 = $response->result->purchase_units[0]->shipping->address->address_line_1;
//   $address2 = $response->result->purchase_units[0]->shipping->address->admin_area_2;
//   $address3 = $response->result->purchase_units[0]->shipping->address->admin_area_1;
//   $address4 = $response->result->purchase_units[0]->shipping->address->postal_code;
//   $address5 = $response->result->purchase_units[0]->shipping->address->country_code;
//   $FullAddress = $address1.", ".$address2.", ".$address3.", ".$address4.", ".$address5; 
//   $paidamount = $response->result->payments->captures[1]->amount->value;
     $client_id = $_SESSION['plan']['client_id'];
    $amount = $response->result->purchase_units[0]->amount->value;
  
        date_default_timezone_set('Asia/Manila');
        $date = date("Y-m-d H:i:s");  

    $status = "undue";
  
  
 /* 
 var_dump($orderID);
 var_dump($email);
 var_dump($name);
 var_dump($FullAddress);

 */
  // Database Connection
  include ('database/db.php'); 
  // prepare and bind
$stmt = $con->prepare("INSERT INTO payment (client_id, amount, date, status) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $client_id, $amount, $date, $status);
$stmt->execute(); 
if (!$stmt) {
  # code...
  echo 'There was a problem on your code'.mysqli_error($con);
}
else{
   header("Location:../payment_receipt.php");
}

$stmt->close();
$con->close();

  }
  
}

if (!count(debug_backtrace()))
{
  GetOrder::getOrder($orderID, true);
}
?>

