<?
define("HOST","127.0.0.1");
define("USER","host2332");
define("PASSWORD","Pzou9p8W");
define("DB","itelit_host2332");

$db=mysql_connect(HOST,USER,PASSWORD);

if(!$db){
	exit("Немає доступу до бази даних, помилка - ".mysql_error());
}	

if(!mysql_select_db(DB,$db)){
	exit("Неможливо вибрати базу даних, помилка - ".mysql_error());
}

mysql_query("SET NAMES 'utf8' ");
?>