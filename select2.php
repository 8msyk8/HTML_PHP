<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>入水量管理結果</title>
</head>
<body>
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
//print $dateFormat2;
//'".$_POST['_key1']."','"$_POST['_key2']."'
//data input
$db=mysql_select_db('wateramount', $con);
//$query = "INSERT INTO inputdata(date,name)VALUES('$dateFormat2','')";
$query = "INSERT INTO inputdata(date,name,place,amount)VALUES('$dateFormat2','$name','$place','$amount')";
$result = mysql_query($query); 
?>

<?php
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