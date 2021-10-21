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
    <h1>Hi, Tye Glover</h1>
    <br>
    <br>
    <br>

    <h4>The property details are as below:</h4>
    <br>
    <table>
      <tr>
        <td>Property ID</td>
        <td>: <?php echo e($property->id); ?></td>
      </tr>
      <tr>
        <td>Location</td>
        <td>: <?php echo e($property->address); ?>, <?php echo e($property->city); ?>, <?php echo e($property->zip); ?></td>
      </tr>
      <tr>
        <td>Country</td>
        <td>: <?php echo e($propertyDetails['county']); ?></td>
      </tr>
      <tr>
        <td>Floors:</td>
        <td>: <?php echo e($propertyDetails['floors']); ?></td>
      </tr>
      <tr>
        <td>Bedrooms/td>
        <td>: <?php echo e($propertyDetails['bedroom']); ?></td>
      </tr>
      <tr>
        <td>Bathrooms</td>
        <td>: <?php echo e($propertyDetails['bathroom']); ?></td>
      </tr>
      <tr>
        <td>Property Type</td>
        <td>: <?php echo e($propertyDetails['property_type']); ?></td>
      </tr>
      <tr>
        <td>Year Built</td>
        <td>: <?php echo e($propertyDetails['built']); ?></td>
      </tr>
      <tr>
        <td>Phone Number</td>
        <td>: <?php echo e($propertyDetails['phone']); ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td>: <?php echo e($user->email); ?></td>
      </tr>
      <tr>
        <td>For Sale</td>
        <td>: <?php echo ($propertyDetails['for_sale'] == '1' ? 'Yes' : 'No'); ?></td>
      </tr>
      <tr>
        <td>Ask Price</td>
        <td>: $<?php echo e($propertyDetails['investment_price']); ?></td>
      </tr>
      <tr>
        <td>Partner Up</td>
        <td>: <?php echo ($propertyDetails['partner_up'] == '1' ? 'Yes' : 'No'); ?></td>
      </tr>
      <tr>
        <td>Sqr. Ft.</td>
        <td>: <?php echo e($propertyDetails['square_footage']); ?></td>
      </tr>
      <tr>
        <td>Price Per Sqr. Ft.</td>
        <td>: $<?php echo e($propertyDetails['price_per_sqft']); ?></td>
      </tr>
      <tr>
        <td>BRV Price</td>
        <td>: $<?php echo e($propertyDetails['brv_price']); ?></td>
      </tr>
      <tr>
        <td>ARV Price</td>
        <td>: $<?php echo e($propertyDetails['arv_price']); ?></td>
      </tr>
      <tr>
        <td>Estimated Repair Cost</td>
        <td>: $<?php echo e($propertyDetails['estimated_repair_cost']); ?></td>
      </tr>
      <tr>
        <td>Partnership Share(%)</td>
        <td>: <?php echo e($propertyDetails['partnership_seller']); ?> / <?php echo e($propertyDetails['partnership_investor']); ?> %</td>
      </tr>
    </table>
    <br>
    Click the below button for approve the property: 
    <br>
    <br>
    <br>
    <a href="https://investout.net/approve-property/<?php echo e($property->id); ?>" style="{display:block;width:115px;height:25px;background:#0b2a4a;padding:10px;text-align:center;border-radius:5px;color:white;font-weight:bold;line-height:25px}">Approve Property</a>

    <br>
    <br>
    <br>

    <h4>Thanks for your consideration.</h4>

    <h4>Invest Out.Net</h4>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
