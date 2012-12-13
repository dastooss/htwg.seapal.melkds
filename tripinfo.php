<!DOCTYPE HTML>
<html>
<head>
	<!--Header-->
	<?php
		$title = "Screenshots";
		include("header.php");
	?>
	<script src="formChecker.js"></script>
</head>
<body>
	<!--Menü-->
	<?php
		$screenshots = "class='current_page_item'";
		include("menu.php");
	?>
	<table class="tripinfo" border="0">
		<form name="formular" action="" method="post">
			<tr>
				<td><label for="triptitle">Trip title </label>
				<input type="text" id="triptitle" name="triptitle" onkeyup="isText(this.value, this.id, 0, true)" /></td>
			</tr>
			<tr>
				<td>
					<table border="0">
						<tr><td><label for="von">Von </label></td><td><input type="text" id="von" name="von" onkeyup="isText(this.value, this.id, 0, true)" /></td></tr>
						<tr><td><label for="nach">Nach </label></td><td><input type="text" id="nach" name="nach" onkeyup="isText(this.value, this.id, 0, true)" /></td></tr>
						<tr><td><label for="skipper">Skipper </label></td><td><input type="text" id="skipper" name="skipper" onkeyup="isText(this.value, this.id, 0, true)" /></td></tr>
					</table>
				</td>
				<td>
					<label for="crew">Crew </label><textarea id="crew" name="crew" rows="3" onkeyup="isText(this.value, this.id, 0, true)" ></textarea>
				</td>
				<td>
					<table border="0">
						<tr><td><label for="start">Start </label></td><td><input type="text" id="start" name="start" onkeyup="isText(this.value, this.id, 0, true)" /></td></tr>
						<tr><td><label for="ende">Ende </label></td><td><input type="text" id="ende" name="ende" onkeyup="isText(this.value, this.id, 0, true)" /></td></tr>
						<tr><td><label for="dauer">Dauer </label></td><td><input type="text" id="dauer" name="dauer" onkeyup="isNumber(this.value, this.id, 0, true)" /></td></tr>
					</table>
				</td>
				<td>
					<table border="0">
						<tr><td><label for="motor">Motor(min) </label></td><td><input type="text" id="motor" name="motor" onkeyup="isNumber(this.value, this.id, 0, true)" /></td></tr>
						<tr><td><label for="tank">Tank gef&uuml;llt </label></td><td><input type="checkbox" id="tank" name="tank" /></td></tr>
					</table>
				</td>
			</tr>
		</form>
	</table>
 <!--
	<table border="0">
		<form action="" method="post">
		<tr>
			<td><b>Notes</b></td>
			<td></td>
			<td><b>Photos</b>
		</tr>
		<tr>
			<td><textarea for="notes" rows="14"></textarea></td>
			<td><img src="./img/map.jpg" /></td>
			<td><img src="./img/noimg.jpg" /></td>
		</tr>
		</form>
	</table>
	<form action="" method="POST">
		<textarea cols="105" rows="8"></textarea>
	</form>
	<button>Neuer Eintrag</button>
	<button>L�schen</button>
	<button>Filter</button>
	<button>Erster</button>
	<button>Letzter</button>
	<button>Vorheriger</button>
	<button>N�chster</button>
 -->
	<!--footer-->
	<?php
		include("footer.php");
	?>
</body>
</html>