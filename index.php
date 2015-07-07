<?php

require_once("functions/find_dominant_colour.php");
($_SERVER['QUERY_STRING']) ? $img = "img/".$_SERVER['QUERY_STRING'] : $img = "img/antelope.jpg";
$c = find_dominant_colour($img);
//$c->setTintExaggeration(30);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Application to get primary color palette from an image">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <title>iTunes Album Palette</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <div class="container">
      <div class="header">
        <h1>iTunes Album Palette</h1>
        <h3 class="text-muted">Click an image for its palette</h3>
    </div>
    
    <div class="row thumbs">
    <?php
    if ($handle = opendir('img/')) {
      /* This is the correct way to loop over the directory. */
      while (false !== ($entry = readdir($handle))) {
        if ((strlen($entry) > 5) && (strrpos($entry, '.', -4))) {
          echo("<a class='thumb' href='./?".$entry."'><img src='img/".$entry."' /></a>");
        }
      }
      closedir($handle);
    }
    ?>
    </div>
    
    <div class="row">
      <div class="col-xs-6">
        <p>Before:</p>
        <img src="<?php echo($img) ?>" class="img-responsive" />
      </div>
      <div class="col-xs-6">
        <p>After:</p>
        <img src="<?php $c->displayPalette(); ?>" class="img-responsive" width="250" />
      </div>
    </div>

    <form action="output/iframe.php" class="form-inline" id="getColour" method="post">      
      <div class="row">   
        <div class="form-group col-sm-4">
          <input type="text" class="form-control" value="<?php $c->displayLighter() ?>" name="colour1" />
        </div>
        <div class="form-group col-sm-4">
          <input type="text" class="form-control" value="<?php $c->displayRGB() ?>" name="colour2" />
        </div>
        <div class="form-group col-sm-4">
          <input type="text" class="form-control" value="<?php $c->displayDarker() ?>" name="colour3" />
        </div>
       </div>
      <div class="row">       
        <div class="form-group col-sm-6 col-sm-offset-3 text-center">
          <input type="hidden" class="hidden" name="textcolor" value="<?php $c->displayTextColour() ?>" />
          <p class="text-muted">Change these values to tweak the palette!</p>
          <input type="submit" id="submitColour" class="btn btn-sm btn-success" value="Change palette!" />
        </div>
      </div>
      <div class="row">
        <div class="ajax-data"> </div>
      </div>

      
      <div class="footer">
        <p>Patrick Paevere 2013 | You areunning php version <?php echo(phpversion()) ?></p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

     <!-- Add-ons
    ================================================== -->
    <script>
    
/* On form submit, do an AJAX call */
$( "#getColour" ).submit(function(e) {
  e.preventDefault();
  
  // get form action  
  var $this = $( this ),
    action = $this.attr( "action" );

  //do an AJAX request
  $.post(
    action,
    $this.serializeArray(),
    function ( data ) {
      // display the returned message
      $ ( '.ajax-data' ).html( data );
    }
  );
});
$( "#getColour" ).submit();

    </script>
  </body>
</html>
