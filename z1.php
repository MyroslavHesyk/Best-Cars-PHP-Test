<!DOCTYPE html>
<html>
	<head>
		<title>Кращі автомобілі</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
<?
	//1. підключення до БД
	include "start.php";
	//2.передаємо значення м в змінну
	$m=$_GET['m'];
	if(!isset($_GET['m'])){
		$m=1;
	}

// if($_GET){
	//	$m=$_GET['m'];
	//}
	//else {
	//	$m=1;
	//}
	//3. витягуємо id та name з таблиці car та поміщаємо у такі ж масиви
	$q=mysql_query("SELECT id, name FROM car");
	for($i=1;$i<=mysql_num_rows($q);$i++){
		$row=mysql_fetch_array($q);
		$id[$i]=$row['id'];
		$name[$i]=$row['name'];
	}
	//4. витягуємо із БД силки на фото відповідно до значення $m
	$q1=mysql_query("SELECT foto FROM foto_car WHERE id_car='$m'");
	for($i=1;$i<=mysql_num_rows($q1);$i++){
		$row=mysql_fetch_array($q1);
		$img_src[$i]=$row['foto'];
	}
?>


		<table width="100%" border="1">
			<tr>
				<td id="logo">
					<h5>Кращі автомобілі  світу</h5>
				</td>
				<td rowspan="2">
					<?
						for($i=1; $i<count($img_src); $i++){
							echo "<p align='center'><img src='$img_src[$i]' width='90%'> </p>";
						}
					?>
				</td>
			</tr>
			
			<tr id='menu' valign="top">
				<td>
					<?
						for($i=1; $i<=count($name); $i++){
							echo"<a href='?m=".$id[$i]."'>".$name[$i]."</a> <br>";
						}
					?>
				</td>
			</tr>
			
		</table>
	</body>

</html>