<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
  </script>
 <style >
 </style> 
  <meta charset="utf-8">
<script src="https://js.braintreegateway.com/web/dropin/1.32.1/js/dropin.min.js"></script>
  
</head>
<body>
  <div id="dropin-container"></div>
 
</body>

  <button id="submit-button">PAY	</button>
  <script>
    var button = document.querySelector('#submit-button');

braintree.dropin.create({
  authorization: 'sandbox_q7dr2y96_zynjg7c9rd5c95z2',
  container: '#dropin-container',
  googlePay: {
    googlePayVersion: 2,
  //  merchantId: 'merchant-id-from-google',
    transactionInfo: {
      totalPriceStatus: 'FINAL',
      totalPrice: '125.00',
      currencyCode: 'AUD'
    },
    allowedPaymentMethods: [{
      type: 'CARD',
      parameters: {
        // We recommend collecting and passing billing address information with all Google Pay transactions as a best practice.
        billingAddressRequired: true,
        billingAddressParameters: {
          format: 'FULL'
        }
      }
    }]
  }
}, function (createErr, instance) {
      button.addEventListener('click', function (event) {
        instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
          // Submit payload.nonce to your server
          console.log(payload);return false;
         // return false;
      window.location.href = 'checkout.php?nounce='+payload.nonce;
        });
      });
    });




  </script>


  