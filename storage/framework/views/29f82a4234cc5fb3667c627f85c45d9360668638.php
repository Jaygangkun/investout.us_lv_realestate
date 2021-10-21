<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  </head>
  <body>
    
    <h4>Thanks and congratulations for taking advantage of this unique opportunity to change the traditional way the residential real estate industry operates.</h4>
    <br>
    <h4>Your decision to become an Invest Out Envoy empowers you with a differentiated offering to your prospective clients, one that is limited to just a very select group of Realtors®. You have now been licensed to operate in the following areas:</h4>
    <ul>
    <?php
      $zip_code = explode(",", $assign_zip_codes);
      foreach ($zip_code as $item) {
          echo "<li>$item</li>";
      }
    ?>
    </ul>
    <br>
    <h4>In the next step, we will send you an email to welcome you to the orientation designed to explain exactly how the system works and a presentation of steps that you can take to find more homes, add more value and make more profit.</h4>
    <br>
    <h4>The Invest Out model is all about offering more value to the clients we represent and the one clear way we know to do this is by truly understanding the needs of our clients. In case of realtors, the biggest challenge most newly licensed Realtors® face is they don't have any established network from which they can receive referrals & connections to build their business.</h4>
    <br>
    <h4>The Invest Out program offers you a way to differentiate your services by offering more value to your potential or existing clients. Additionally, as we add more services, you will have an opportunity to work with pre-listed homes and the renovating partners to aid in the timely but focused renovation of the home thereby creating increased value for all parties involved.</h4>
    <br>
    <h4>Our team will get in touch with you shortly with regards to next steps and classes that have been developed to support you in your journey towards growth in your real estate business.</h4>
    <br>
    <h4>We look forward to have a long-term agency relationship with you.</h4>

    <br>
    <br>
    <br>

    <h4>Thanks for your consideration.</h4>

    <h4>Invest Out.Net</h4>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
