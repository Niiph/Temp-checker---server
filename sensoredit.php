<?
$tytul = 'Kontrola temperatur';
$act = 'index';
include('header.php');
include('navbar.php');
include('sensor_funct.php');
$s = $_GET['s'];
$type = $_GET['type'];

?>
<div class="row">
  <div class="col-sm-6">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Edycja czujnika <? if ($type == 'new') echo '- dodaj nowy czujnik'; ?></h3>
      </div>
      <div class="panel-body">
        <?
        sensoredit($s, $type);
        ?>
      </div>
    </div>
  </div>

</div>




<?
include('footer.php');
?>