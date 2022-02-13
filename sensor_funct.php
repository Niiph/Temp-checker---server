<?php
include('config.php');

function lastreading()
{
	global $link;
	$query = "SELECT symbol, name, id FROM `sensorsg` WHERE active=1 ORDER BY symbol ASC";
	if ($result = mysqli_query($link, $query)) {
		echo '<table class="table table-striped"><th>Czujnik</th><th>Nazwa</th><th>Odczyt</th><th></th>';
		while ($row = mysqli_fetch_array($result)) {
			$id = $row['id'];
			echo '<tr>';
			echo '<td>' . $row['symbol'] . '</td>';
			echo '<td>' . $row['name'] . '</td>';
			echo '<td>';
			$subquery = "SELECT value FROM readg WHERE sensorid = " . $id . " ORDER BY date DESC LIMIT 1";
			if ($subresult = mysqli_query($link, $subquery)) {
				while ($subrow = mysqli_fetch_array($subresult)) {
					echo liczba($subrow['value']);
				}
			}
?>
			</td>
			<td>
				<form action="/details.php" method="get">
					<input type="hidden" name="s" value="<? echo $id; ?>">
					<button type="submit" class="btn btn-primary btn-xs btn-info">
						Szczegóły
					</button>
				</form>
			<?
			echo "</td></tr>\n";
		}

		/* free result set */
		mysqli_free_result($result);
		echo '</table>';
	} else {
		echo "0";
	}
}

function detailedreadings($s)
{
	global $link;
	$lp = 1;
	$query = "SELECT value, date FROM readg WHERE sensorid = " . $s . " ORDER BY date DESC LIMIT 150";
	if ($result = mysqli_query($link, $query)) {
		echo '<table class="table table-condensed table-hover"><th>Lp.</th><th>Godzina</th><th>Odczyt</th>';
		while ($row = mysqli_fetch_array($result)) {
			echo '<tr>';
			echo '<td>' . $lp++ . '</td>';
			echo '<td>' . $row['date'] . '</td>';
			echo '<td>' . liczba($row['value']) . '</td>';
			echo "</tr>\n";
		}

		/* free result set */
		mysqli_free_result($result);
		echo '</table>';
	} else {
		echo "0";
	}
}

function sensordata($s)
{
	global $link;
	$query = "SELECT symbol, name, address, pinid, active, minimum, maximum FROM `sensorsg` WHERE id = " . $s . "";
	if ($result = mysqli_query($link, $query)) {
		echo '<table class="table table-striped"><th>Ustawienie</th><th>Wartość</th></tr>';

		while ($row = mysqli_fetch_array($result)) {
			echo '<tr><td>Symbol<td>' . $row['symbol'] . '</td></tr>';
			echo '<tr><td>Nazwa<td>' . $row['name'] . '</td></tr>';
			echo '<tr><td>Złącze<td>' . $row['pinid'] . '</td></tr>';
			echo '<tr><td>Adres<td>' . $row['address'] . '</td></tr>';
			echo '<tr><td>Minimum<td>' . $row['minimum'] . '</td></tr>';
			echo '<tr><td>Maksimum<td>' . $row['maximum'] . '</td></tr>';
			echo '<tr><td>Aktywny<td><input type="checkbox" disabled name="active" value="active"';
			if ($row['active'] == 1)
				echo ' checked ';
			echo '></td></tr>';
		}

		/* free result set */
		mysqli_free_result($result);
		echo '</table>';
			?>
			<form action="/sensoredit.php" method="get">
				<input type="hidden" name="s" value="<? echo $s; ?>">
				<input type="hidden" name="type" value="edit">
				<button type="submit" class="btn btn-primary btn-info">
					Edytuj
				</button>
			</form>
		<?
	} else {
		echo "0";
	}
}

function sensoredit($s, $type)
{
	global $link;
	$query = "SELECT symbol, name, address, pinid, active, minimum, maximum FROM `sensorsg` WHERE id = " . $s . "";
	if ($result = mysqli_query($link, $query)) {
		echo '<form action="/settingssave.php" method="post">';
		echo '<table class="table table-striped"><th>Ustawienie</th><th>Wartość</th></tr>';

		//		while ($row = mysqli_fetch_array($result)) {
		$row = mysqli_fetch_array($result);
		echo '<tr><td>Symbol</td><td><input type="text" required maxlength="5" name="symbol" value="' . $row['symbol'] . '"></td></tr>';
		echo '<tr><td>Nazwa</td><td><input type="text" required size="30" maxlength="30" name="name" value="' . $row['name'] . '"></td></tr>';
		echo '<tr><td>Złącze (od 1 do 5)</td><td><input type="number" required size="5" name="pinid" min="1" max="5" value="' . $row['pinid'] . '"></td></tr>';
		echo '<tr><td>Adres<br>(8 znaków hex)</td><td><input type="text" required size="35" name="address" value="' . $row['address'] . '"></td></tr>';
		echo '<tr><td>Minimum</td><td><input type="number" size="5" name="minimum" min="0" max="100" value="' . $row['minimum'] . '"></td></tr>';
		echo '<tr><td>Maksimum</td><td><input type="number" size="5" name="maximum" min="0" max="100" value="' . $row['maximum'] . '"></td></tr>';
		echo '<tr><td>Aktywny</td><td><input type="checkbox" name="active" value="active"';
		if ($row['active'] == 1)
			echo ' checked ';
		if ($type == 'new')
			echo ' checked ';
		echo '></td></tr>';
		//    }
		/* free result set */
		mysqli_free_result($result);
		echo '</table>';
		?>
			<input type="hidden" name="s" value="<? echo $s; ?>">
			<input type="hidden" name="type" value="<? echo $type; ?>">
			<button type="submit" class="btn btn-primary btn-info">
				Zapisz
			</button>
			</form>
			<?
		} else {
			echo "0";
		}
	}

	function sensorlist($active)
	{
		global $link;
		$query = "SELECT symbol, name, id FROM `sensorsg` WHERE active='$active' ORDER BY symbol ASC";
		if ($result = mysqli_query($link, $query)) {
			echo '<table class="table table-striped"><th>Czujnik</th><th>Nazwa</th><th>Odczyt</th><th></th>';
			while ($row = mysqli_fetch_array($result)) {
				$id = $row['id'];
				echo '<tr>';
				echo '<td>' . $row['symbol'] . '</td>';
				echo '<td>' . $row['name'] . '</td>';
				echo '<td>';
				$subquery = "SELECT value FROM readg WHERE sensorid = " . $id . " ORDER BY date DESC LIMIT 1";
				if ($subresult = mysqli_query($link, $subquery)) {
					while ($subrow = mysqli_fetch_array($subresult)) {
						echo liczba($subrow['value']);
					}
				}
			?>
			</td>
			<td>
				<form action="/details.php" method="get">
					<input type="hidden" name="s" value="<? echo $id; ?>">
					<button type="submit" class="btn btn-primary btn-xs btn-info">
						Szczegóły
					</button>
				</form>
	<?php
				echo '</td></tr>';
			}

			/* free result set */
			mysqli_free_result($result);
			echo '</table>';
		} else {
			echo "0";
		}
	}
	?>