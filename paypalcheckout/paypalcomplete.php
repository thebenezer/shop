<?php
namespace Sample;

require __DIR__ . '/vendor/autoload.php';
//require 'paypalconfig.php';
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
//use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
class PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use LiveEnvironment.
     */
    public static function environment()
    {
        $clientId = getenv("CLIENT_ID") ?: "AdUfs155hbsqLcVXWFpohb2fRt2-noovFWlkv0ch5xLs4c-pKDz_3SZYppQrJn4oQeBAtZrelsuKn654";//PAYPAL-SANDBOX-CLIENT-ID
        $clientSecret = getenv("CLIENT_SECRET") ?: "EDkcQEbUa4yv5P_Nut5bQCsat1Hk9RypJF6q2N_aLH1kUd4w0kF2Tcf0tmbS60c0y082xoMqDMPYrt5J";//PAYPAL-SANDBOX-CLIENT-SECRET
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}
class GetOrder
{
//
//   // 2. Set up your server to receive a call from the client
//   /**
//    *You can use this function to retrieve an order by passing order ID as an argument.
//    */
  public static function getOrder($orderId)
  {
    // 3. Call PayPal to get the transaction details
    $client = PayPalClient::client();
    $response = $client->execute(new OrdersGetRequest($orderId));

    //SAVING ORDER ID AND PAYER DETAILS
    $conn= mysqli_connect("localhost","root","","monochromatic");
    $sql="INSERT INTO orders (orderID,intent,status,invoiceID,total_amount,currency_code,fname,lname,email)
           values (?,?,?,?,?,?,?,?,?)";
    $stmt= mysqli_stmt_init($conn2);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      echo "Sorry, There seems to be some error. Please try again later.. :p";
      header("Location: ../errors.php?error=pcompfail");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, 'ssssdssss',
      {$response->result->id},
      {$response->result->intent},
      {$response->result->status},
      {$response->result->purchase_units[0]->invoice_id},
      {$response->result->purchase_units[0]->amount->value},
      {$response->result->purchase_units[0]->amount->currency_code},
      {$response->result->payer->name->given_name},
      {$response->result->payer->name->surname},
      {$response->result->payer->email_address});
      mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);


    // $stmt= mysqli_stmt_init($conn2);
    // $sql="INSERT INTO orders (orderID,intent,status,invoiceID,total_amount,currency_code,fname,lname,email)
    //        values (
    //         '{$response->result->id}',
    //         '{$response->result->intent}',
    //         '{$response->result->status}',
    //         '{$response->result->purchase_units[0]->invoice_id}',
    //         '{$response->result->purchase_units[0]->amount->value}',
    //         '{$response->result->purchase_units[0]->amount->currency_code}',
    //         '{$response->result->payer->name->given_name}',
    //         '{$response->result->payer->name->surname}',
    //         '{$response->result->payer->email_address}'
    //       );";
    // mysqli_query($conn2,$sql);
    // mysqli_close($conn2);
  }
}

/**
 *This driver function invokes the getOrder function to retrieve
 *sample order details.
 */
if (!count(debug_backtrace()))
{
$json = file_get_contents('php://input');
$data = json_decode($json);
$orderid = $data->orderID;
$ordid=$orderid.'ebe';
$conn= mysqli_connect("localhost","root","","monochromatic");
$stmt= mysqli_stmt_init($conn);
$sql="INSERT INTO simplyorder (ordid) values ('$ordid');";
mysqli_query($conn,$sql);
mysqli_stmt_close($stmt);
mysqli_close($conn);
  GetOrder::getOrder($orderid);
}
?>
