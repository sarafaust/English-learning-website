<!DOCTYPE html>
<html style="height:100%">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#000000">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="first_page.css">
  <link rel="stylesheet" href="englishWeb.css">
  <link rel="stylesheet" href="buyPermission.css">


  <title>English Demo</title>
</head>
<script src="englishWeb.js"></script>
<script src="buyPermission.js"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
    sandbox: 'demo_sandbox_client_id',
    production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
    size: 'small',
    color: 'gold',
    shape: 'pill',
    },
    // Set up a payment
    payment: function (data, actions) {
    return actions.payment.create({
    transactions: [{
    amount: {
    total: '0.01',
    currency: 'USD'
    }
    }]
    });
    },
    // Execute the payment
    onAuthorize: function (data, actions) {
    return actions.payment.execute()
    .then(function () {
    // Show a confirmation message to the buyer
    window.alert('Thank you for your purchase!');
    });
    }
    }, '#paypal-button');
</script>

<body style="margin:0; height:100%; max-width:100%">



    <div class="container">
        <div class="row1">
                    <a onclick="languegeModeBtn()" title="שפות"><img class="serviceBtn" src=".\assets\images\png\LangEng.png"></a>
                    <a  onclick="infoBtn()" title="עזרה"><img class="serviceBtn" src=".\assets\images\png\help.png"></a>
        </div>

        <div id = "titleID">
            על מנת לקבל הרשאה לשיעורים  הכנס קוד  או רכש הרשאה
        </div>

        <div id="perCodeWrpID">
         <form method="post">
            <input id="btnPerID" type="submit"  value="קבל הרשאה" onclick="checkCodePerm()">
            <input type="password" id="permissionID" name="permission code"  placeholder="הכנס קוד הרשאה" required >
        </div>
        <div id="perBuyID">
            <div id="t_buyID">רכוש הרשאה </div>
               <div id="coWrprID"><div id="paypal-button"></div></div>
        </div>

    </div>
</body>
</html>