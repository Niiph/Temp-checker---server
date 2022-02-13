<?
$tytul = 'Kontrola temperatur';
$act = 'index';
include('header.php');
include('navbar.php');
include('sensor_funct.php');
include('charts.php');
$s = $_GET['s'];
?>
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Wykres temperatur</h3>
      </div>
      <div class="panel-body">
        <?
        makechart($s);
        ?>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Odczyty</h3>
      </div>
      <div class="panel-body">
        <?
        detailedreadings($s);
        ?>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Dane czujnika</h3>
      </div>
      <div class="panel-body">
        <?
        sensordata($s);
        ?>
      </div>
    </div>
  </div>
  <!--
		<div class="col-sm-6">
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">Dane czujnika</h3>
            </div>
            <div class="panel-body">
<?
//makechart3($s);
?>
            </div>
          </div>
        </div>
		-->
</div>




<?
include('footer.php');
?>