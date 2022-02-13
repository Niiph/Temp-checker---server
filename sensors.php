<?
$tytul = 'Kontrola temperatur';
$act = 'index';
include('header.php');
include('navbar.php');
include('sensor_funct.php');
?>
<div class="row">
  <div class="col-sm-6">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Lista aktywnych czujników</h3>
      </div>
      <div class="panel-body">
        <?
        sensorlist(1);
        ?>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title">Lista nieaktywnych czujników</h3>
      </div>
      <div class="panel-body">
        <?
        sensorlist(0);
        ?>
      </div>
    </div>
  </div>
</div>




<?
include('footer.php');
?>