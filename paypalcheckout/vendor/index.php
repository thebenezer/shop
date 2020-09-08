<!DOCTYPE html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>

<body>
  <script
    src="https://www.paypal.com/sdk/js?client-id=AdUfs155hbsqLcVXWFpohb2fRt2-noovFWlkv0ch5xLs4c-pKDz_3SZYppQrJn4oQeBAtZrelsuKn654"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>

  <p id="demo"></p>

  <div id="paypal-button-container"></div>
  <script>
    paypal.Buttons({
      style: {
                color:  'blue',
                shape:  'pill',
                label:  'pay',
                height: 40
            },

      createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '0.01'
          }
        }],
        application_context: {
          shipping_preference: 'NO_SHIPPING'
        }
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        alert('Transaction completed by ' + details.payer.name.given_name);
        document.getElementById("demo").innerHTML = data.orderID;
        // Call your server to save the transaction
        return fetch('/paypalcheckout/paypalcomplete.php', {
          method: 'post',
          headers: {
            'content-type': 'application/json'
          },
          body: JSON.stringify({
            orderID: data.orderID
          })
        });
      });
    }
    }).render('#paypal-button-container');
  </script>


</body>
