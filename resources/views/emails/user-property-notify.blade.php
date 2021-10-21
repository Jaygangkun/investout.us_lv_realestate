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
    <h1>Dear {{ $user->name() }}</h1>
    <br>
    <br>
    <br>

    <h4>This email is to notify you that your Property with id {{ $property['id'] }} is being checked for
      @if ($property['acceptance_level'] == 1)
        Seller Validation
      @elseif ($property['acceptance_level'] == 2)
        Property Evaluation
      @elseif ($property['acceptance_level'] == 3)
        Title and Lines Search
      @elseif ($property['acceptance_level'] == 4)
        Property Market Evaluation
      @endif
    </h4>
    <br>
    <br>
    <br>

    <h5>Thank You, Investout Team</h5>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
