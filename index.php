<?php
session_start();

date_default_timezone_set('Asia/Calcutta');

$logs = array();
$logs['time'] = date("d-m-Y H:i:s:e");
$logs['server'] = $_SERVER;
$logs['session'] = $_SESSION;
echo "<br>";

define('IMAGE_PATH','./images/');


if(isset($_POST['submit'])) {
	?>
	<html>
	<h1>You chose</h1>
	<img src = '<?php echo $_SESSION['image_url']?>'>
	<a href='' target="_top">Give another try?</a>
	</html>
	<?php
}
else {
	
	$image_urls = array(
						IMAGE_PATH . '0.jpg',
						IMAGE_PATH . '1.jpg',
						IMAGE_PATH . '2.jpg',
						IMAGE_PATH . '33.jpg',
						IMAGE_PATH . '44.jpg',
						IMAGE_PATH . '55.jpg',
						IMAGE_PATH . '6.jpg',
						IMAGE_PATH . '7.jpg',
						IMAGE_PATH . '8.jpg',
						
					   );
	sleep(1);
	
	$images = array();
	for($i=0;$i<=103;$i++)
	{
		$images[] = $image_urls[array_rand($image_urls)];
		//echo '<br>'. array_rand($image_urls);
		
	}

	//$j = (int) rand(0,98);
	$j = (int) _getRandomNumber();
	
	
	$_SESSION['image_url'] = $images[$j];
	

	for($i=8;$i<98;)
	{
		$images[$i] = $images[$j];
		$i = $i+9;
		
	}
	
	$i = 0;
	$j=1;
	?>
	<html>
	<font color='red'>
	Choose a number between 10 to 99 ex: 21, add the two digits (2+1=3),
	<br>
	and subtract the answer from the original number (21-3=18)
	<br>
	Select the image that is next to the result you got by subtracting the sum.
	<br>
	Click OK button.
	</font>
	<table border=1>	
	<?php
	foreach($images as $image) {
		
		if($i == 8) {
			$i=0;
			?>
			<tr>
			<?php
		}
		$i++;
		?>
		
			<td><b><?php echo $j . ": "?></b><img src = '<?php echo $image?>' width=30 height=30> </td>
		
		
		
		<?php
		
		$j++;
	}
	?>
	
	<form method='POST'>
	<input type="submit" name="submit" value="OK">
	</form>
	</html>
	<?php
}

function _getRandomNumber()
{
		$j = (int) rand(0,98);
		if(in_array($j, array(9,18,27,36,45,54,63,72,81,90))) {
			
			_getRandomNumber();
		}
		return $j;
}
