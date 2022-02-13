    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Kontrola temperatur</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <? if ($act == 'index') echo 'class="active"'; ?>><a href="/">Strona główna</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ustawienia<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="sensoredit.php?s=0&type=new">Dodaj czujnik</a></li>
                <li><a href="sensors.php">Lista czujników</a></li>
              </ul>
            </li>

          </ul>
          <!--         <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li><a href="../navbar-static-top/">Static top</a></li>
            <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>
          </ul> -->
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>
    <?
    /*$id=sha1($nick);
$dostep = mysql_fetch_array(mysql_query("SELECT rights FROM `repouser` WHERE login = '$id'"));
if ($prawa >> $dostep['0']) {
echo 'Nie masz uprawnień do korzystania z tej strony!';
exit;
}*/
    ?>