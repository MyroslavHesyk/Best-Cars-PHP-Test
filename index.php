<!DOCTYPE html>
<html>
	<head>
		<title>Кращі автомобілі</title>
		<link rel='stylesheet' type='text/css' href='style.css'>
	</head>

	<body>
<?
//1.підключення БД
include "start.php";
//2.перевірка наявності змінної 
$am=get_action_menu();
//3.витягування id та name із БД і поміщається в двовимірний масив
$menu=get_menu();
//4.витягування фото із БД і поміщається в масив
$foto=get_foto($am);
?>

<table id='center' cellspacing='0'border='1'>
	<tr id='top'>
		<td id='logo_text'> 
			<h5>Кращі автомобілі світу</h5>
		</td>
		<td rowspan='2' id='content'>
			<? print_foto($foto); ?>
		</td>
	</tr>
	<tr>
		<td id='menu'>
			<? print_menu($menu); ?>
		</td>
	</tr>
</table>
	</body>

</html>

<?
	function get_action_menu(){
		$menu=$_GET['menu'];
		if(!isset($_GET['menu'])){
			$menu=1;
		}
		return $menu;
	}
	
	function get_menu(){
		$tab=mysql_query("SELECT * FROM car");
		$i=1;
		while($row=mysql_fetch_array($tab)){
			$menu[$i]['id']=$row['id'];
			$menu[$i]['name']=$row['name'];
			$i++;
		}
		return $menu;
	}
	function get_foto($am){
		$tab=mysql_query("SELECT foto FROM foto_car WHERE id_car='$am'");
		$i=1;
		while($row=mysql_fetch_array($tab)){
			$foto[$i]=$row['foto'];
			$i++;
		}
		return $foto;
	}
	
	function print_menu($menu){
		for($i=1;$i<=count($menu);$i++){
			 echo"<a href='?menu=".$menu[$i]['id']."'>".$menu[$i]['name']."</a> <br>";
		}
	}
	
	function print_foto($foto){
		for($i=1;$i<=count($foto);$i++){
			echo "<div class='foto_car'>";
				echo "<img src='".$foto[$i]."'>";
			echo"</div>";
		}
	}
?>