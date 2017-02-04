<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>MariaDBへの接続テスト</title>
</head>
<body>

<SCRIPT TYPE="text/javascript">
<!--
//――――――――――――――――――――――――――――――――――――――
// 作成者 るび～/ACCESS R http://www5e.biglobe.ne.jp/~access_r/
//――――――――――――――――――――――――――――――――――――――
function DataReceive(){
		//?以降の文字を取得する
	var data = location.search.substring(1, location.search.length);
		//エスケープされた文字をアンエスケープする
	data = unescape(data);
		//アラートで?以降の文字を表示する
	alert(data);
}
window.onload = DataReceive;
//-->
</SCRIPT>
<?php
$date=$_GET['date'];
$name=$_GET['name'];
$place=$_GET['place'];
$amount=$_GET['amount'];
$dateFormat1 = str_replace('/', '-', $date);
$dateFormat2 = str_replace('2017-', '', $dateFormat1);

$con = mysql_connect('localhost', 'root', '');
//print $date;
print $name;
print $place;
print $amount;
//print $dateFormat1;
print $dateFormat2;


mysql_select_db('wateramount', $con);
$quryset = mysql_query('SET NAMES utf8', $con);
$quryset = mysql_query('SELECT * FROM table1');
 
//http://mikako.pupu.jp/?p=1142

print "<table border='1'>";
print "<tr>";
print "<th>名前</th>";
print "<th>場所/日付</th>";

 while($table = mysql_fetch_assoc($quryset)) {
     print "<th>";
     $replace = str_replace('2017-', '', $table['date']);
    // print $table['date']."<br />"."</th>";
     print $replace."<br />"."</th>";
  }
  print "</tr>";
  print "</table>";
?>



</body>
</html>