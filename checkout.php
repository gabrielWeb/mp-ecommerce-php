<?php
// SDK de Mercado Pago

require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('APP_USR-6588866596068053-041607-428a530760073a99a1f2d19b0812a5b6-491494389');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item-> id= "1234";
$item-> picture_url= $_POST["imagen"];
$item->title = "";
$item->description= $_POST["descripcion"];
$item->quantity = $_POST["cantidad"];
$item->unit_price = $_POST["amount"];
$item-> external_reference = "ABCD1234";
$preference->items = array($item);

$preference->payment_methods = array(
  "excluded_payment_methods" => array(
    array("id" => "amex")
  ),
  "excluded_payment_types" => array(
    array("id" => "atm")
  ),
);
$preference-> Payer = array(
    "name" => "Lalo Landa",
    "email"=> "test_user_58295862@testuser.com",
    "phone"=> array(
        "area-code" => '52',
        "number" => '55 49737300',
    ),
    "address"=> array(
        "street_name"=> "Insurgentes Sur",
        "street_number" => "1602",
        "zip_code"=> "03940"
    )
);
$preference->back_urls = array(
    "success" => "https://asociado.sectornetcancun.com/succes.php",
    "failure" => "https://asociado.sectornetcancun.com/failure.php",
    "pending" => "https://asociado.sectornetcancun.com/pending.php"
);
$preference->auto_return = "approved";
$preference->save();

//print_r($preference);
?>
<!DOCTYPE html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=1024">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>E-commerce</title>
        <style type="text/css">
            #top{
                background:  #2D3277;
                padding: 20px;
            }
            .container{
                margin-top: 50px;
            }
            footer{
                background-color: #2D3277;
                padding: 40px;
            }
        </style>
    </head>
    <body>
    <div id="top">

    </div>
    <div class="container">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-4">
            <img src="<?php print $_POST["imagen"]?>" width="140">
        </div>
        <div class="col-md-4">
            <form action="" method="POST">
              <script
               src="https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js"
               data-preference-id="<?php echo $preference->id; ?>" data-button-label="Pagar Compra">
              </script>
            </form>
        </div>
    </div>
</div>
<footer>
    
</footer>
</body>
</html>