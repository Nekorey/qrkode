<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Membuat QRcode Dengan PHP by Radi</title>
	<link href="style.css" rel="stylesheet">
</head>
<body>
	<h3>Membuat QRcode Generator Dengan PHP</h3>
	<p>
	<form method="post" action="">
	<fieldset>
	<p>
	<label for="qr_code_data">Masukkan Konten Data QRcode</label>
	<input type="text" name="qr_code_data" id="qr_code_data" minlength="4" required	value="<?php $val=isset($_POST['generate']) ? $_POST['qr_code_data'] : ""; echo $val; ?>">
	</p>
	<p>
	<input type="submit" name="generate" id="btn_submit" value="Generate QRCode">
	</p>
	</fieldset>
	</form>
	</p>
	<p>
    <?php
	if (isset($_POST['generate'])){
		include "qr_code/qrlib.php"; 
		/*create folder*/
		$tempdir="img-qrcode/";
		if (!file_exists($tempdir))
		mkdir($tempdir, 0755);
		$file_name=date("Ymd").rand().".png";	
		$file_path = $tempdir.$file_name;
		
		QRcode::png($_POST['qr_code_data'], $file_path, "H", 6, 4);
		/* param (1)qrcontent,(2)filename,(3)errorcorrectionlevel,(4)pixelwidth,(5)margin */
		
		echo "<p class='result'>Result :</p>";
		echo "<p><img src='".$file_path."' /></p>";
	}
    ?>
</body>
</html>