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
        <h3 class="panel-title">Bieżące odczyty</h3>
      </div>
      <div class="panel-body">
        <?
        lastreading();
        ?>
      </div>
    </div>
  </div>
</div>

<?
include('footer.php');
?>