<?php
	require_once('connect_db.php');

	//input boxes for guest
	echo "	<!DOCTYPE html>
			<html lang='en'>
				<head>
				<link rel='stylesheet' href='css/gueiiter.css' />
<!-- Loading Bootstrap -->
    <link href='bootstrap/css/bootstrap.css' rel='stylesheet'>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			    <!-- Flat UI -->
			    <link href='css/flat-ui.css' rel='stylesheet' media='screen'>
				</head>
				<body>
				<div id='longcontainer'>
					<div id='uppertitle'>
						<h1>Welcome to Gueiiter! <br/>Please leave your message here</h1>
					</div>				
					<div id='forme'>
						<form method='post' action='gueiit.php'>
								<input aria-required='true' required type='text' placeholder='your message please' class='text_field' name='pesan' id='pesan'/>
								<input aria-required='true' required type='text' placeholder='your name' class='text_field' name='gname' id='gname'/>
								<input type='text' placeholder='youremail@email.com' class='text_field' name='email' id='email'/>
								<input type='submit' class='btn btn-primary' value='send' name='submit' id='submit'/>
								</form>
						</div>					
						<div id='timeline'>
		";
	//here goes the timeline sort descending newest first
	$query2 = sprintf('SELECT * FROM `timeline` ORDER BY `timeline`.`id` DESC');
	$result2 = mysql_query($query2, $gueiiter_db);
	if (mysql_num_rows($result2) == 0) {
            throw new Exception('Image with specified ID not found');
        }		
	//echo $now = date('Y-m-d H:i:s',time()); 
	$nowts = time();
	for($i=0; $i < mysql_num_rows($result2); $i++){
		$image = mysql_fetch_array($result2);					
		echo "				
							<article>								
								<div id='profpic'>&nbsp</div>
								<div class='span6'>
								<p class='nama'>";
								echo $image['nama'];echo "<br/><a href='mailto:";
								echo $image['email'];echo "'>";echo $image['email'];echo "</a>";echo "</p><p class='pesan'>";
								echo $image['pesan'];echo "</p><p class='waktu'>";
								//echo $image['submitime'];echo '<br/>";
								$dates = DateTime::createFromFormat('Y-m-d H:i:s',$image['submitime']);
								$subts = date_timestamp_get($dates);
								echo just($nowts-$subts);							
								echo "</p>		
								</div>																
							</article>
			";
	}	
	echo "				</div>
	
						<footer>
							<p>
								&copy; Copyright by Wardah Kaddihani
							</p>
						</footer>
					</div>
					<!-- Load JS here for greater good =============================-->
    <script src='js/jquery-1.8.3.min.js'></script>
    <script src='js/jquery-ui-1.10.3.custom.min.js'></script>
    <script src='js/jquery.ui.touch-punch.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/bootstrap-select.js'></script>
    <script src='js/bootstrap-switch.js'></script>
    <script src='js/flatui-checkbox.js'></script>
    <script src='js/flatui-radio.js'></script>
    <script src='js/jquery.tagsinput.js'></script>
    <script src='js/jquery.placeholder.js'></script>
    <script src='js/jquery.stacktable.js'></script>
    <script src='http://vjs.zencdn.net/c/video.js'></script>
    <script src='js/application.js'></script>
				</body>
			</html>
			";
	function just($timeStamp){
		$tahun = $timeStamp / 30758400;		$mtahun = $timeStamp % 30758400;
		$bulan = $mtahun / 2592000;		$mbulan = $mtahun % 2592000;
		$minggu = $mbulan / 604800;		$mminggu = $mbulan % 604800;
		$hari = $mminggu / 86400;		$mhari = $mminggu % 86400;
		$jam = $mhari / 3600;		$mjam = $mhari % 3600;
		$menit = $mjam / 60;		$detik = $mjam % 60;
		$justo = '';
		if (intval($tahun) > 0){$justo .= sprintf('%d tahun ', $tahun);}			
		if (intval($bulan) > 0){$justo .= sprintf('%d bulan ', $bulan);}			
		if (intval($minggu) > 0){$justo .= sprintf('%d minggu ', $minggu);}
		if (intval($hari) > 0){$justo .= sprintf('%d hari ', $hari);}
		if (intval($jam) > 0){$justo .= sprintf('%d jam ', $jam);}			
		if (intval($menit) > 0){$justo .= sprintf('%d menit ', $menit);}			
		if (intval($detik) > 0){$justo .= sprintf('%d detik ', $detik);}	
		$justo .= 'yang lalu';
		return $justo;
	}
?>
