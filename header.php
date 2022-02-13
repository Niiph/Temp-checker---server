<?
session_start();
ini_set('display_errors', 'on');
?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="iso-8859-2">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="robots" content="noindex" />
  <link rel="icon" href="favicon.png">

  <title><? echo $tytul; ?></title>



  <!-- Bootstrap core CSS -->
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap theme -->
  <link href="bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">

  <!-- Custom styles for this template
    <link href="signin.css" rel="stylesheet">
    <link href="navbar-fixed-top.css" rel="stylesheet">  -->
  <link href="theme.css" rel="stylesheet">
  <link href="datepicker3.css" rel="stylesheet">
  <script src="bootstrap/js/bootstrap-datepicker.js"></script>

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="bootstrap/docs/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <?

  function liczba($liczba)
  {
    return number_format($liczba, 2, ",", " ");
  }

  function tabelka($zawartosc, $tytul, $wielkosc)
  {
    echo '       <div class="col-sm-' . $wielkosc . '">';
    echo '          <div class="panel panel-success">';
    echo '            <div class="panel-heading">';
    echo '              <h3 class="panel-title">' . $tytul . '</h3>';
    echo '            </div>';
    echo $zawartosc();
    echo '          </div>';
    echo '        </div>';
  }
  ?>