

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://ummta.org/favicon.png">

    <title>Manage ummta.org</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <style>
    .colourBox {border: 1px lightgrey solid; margin: 4em 1.5em;}
    .img-circle {height:185px;}
    #colour1 {background:<?php echo $_GET['colour1']?>}
    #colour2 {background:<?php echo $_GET['colour2']?>}
    #colour3 {background:<?php echo $_GET['colour3']?>}

    </style>

  </head>

  <body>

    <div class="container">
      <div class="header">
        <h3 class="text-muted">Colour Output</h3>
      </div>
        <div class="row">        
	        <div class="col-xs-3 img-circle colourBox" id="colour1"></div>
	        <div class="col-xs-3 col-xs-offset-1 img-circle colourBox" id="colour2"></div>
	        <div class="col-xs-3 col-xs-offset-1 img-circle colourBox" id="colour3"></div>
        </div>
      
      
      <div class="footer">
        <p>&copy; Patrick Paevere 2013 | Running php version <?php echo(phpversion()) ?></p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

     <!-- Add-ons
    ================================================== -->
    
  </body>
</html>
