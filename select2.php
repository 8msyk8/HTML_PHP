<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>入水量管理結果</title>
</head>
<body>
<?php
//HTMLで入力したデータの取得
$date=$_GET['date'];
$name=$_GET['name'];
$place=$_GET['place'];
$amount=$_GET['amount'];
$dateFormat1 = str_replace('/', '-', $date);
$dateFormat2 = str_replace('2017-', '', $dateFormat1);

$con = mysql_connect('localhost', 'root', '');
//DBへの入力
$db=mysql_select_db('wateramount', $con);
$query = "INSERT INTO inputdata(date,name,place,amount)VALUES('$dateFormat2','$name','$place','$amount')";
$result = mysql_query($query); 
?>

<?php
mysql_select_db('wateramount', $con);
$quryset = mysql_query('SET NAMES utf8', $con);
$quryset = mysql_query('SELECT * FROM table1');

//http://mikako.pupu.jp/?p=1142
print $dateFormat2;
print "<table border='1'>";
print "<tr>";
print "<th>名前</th>";
print "<th>場所/日付</th>";
$count = 0;
 while($table = mysql_fetch_assoc($quryset)) {

     print "<th>";
     $replace = str_replace('2017-', '', $table['date']);
    // print $table['date']."<br />"."</th>";
	$dateFormatArray[] = $replace;
	
     //print $replace."<br />"."</th>";
     print $dateFormatArray[$count]."<br />"."</th>";
     $count = $count +1 ;
    
  }
   //print count($dateFormatArray);
  print "</tr>";
  ?>

<?php
/*
//input date trial
mysql_select_db('wateramount', $con);
$quryset = mysql_query('SET NAMES utf8', $con);
$quryset = mysql_query('SELECT * FROM table1');
  print "<tr>";
  while($table1 = mysql_fetch_assoc($quryset)) {
  print "<td>";
  print $table1['date']."</td>";
 
  }
  print "</tr>";
*/
?>

<?php
  //http://www.tryphp.net/phpref-operators_comparison/
 mysql_select_db('wateramount', $con);
 $qury1 = mysql_query('SET NAMES utf8', $con);
 //$qury1 = mysql_query('SELECT * FROM inputdata');
 $qury1 = mysql_query('SELECT DISTINCT name,place FROM inputdata');

  while($table1 = mysql_fetch_assoc($qury1)) {
   $outputName = $table1['name'];
   $outputPlace =$table1['place'];
   $outputNameArray[] =  $outputName;
   //print $outputNameArray[0]."outputarray";
   
   
   $firstDispCount = 1;
   //if ($outputName === $name and $outputPlace === $place and  $firstDispCount === 1 ) {
     //   echo "outTrue";
        print "<tr>";
        print "<td>$outputName</td>";
        print "<td>$outputPlace</td>";
  		
        $firstDispCount = 2;
    //}elseif($firstDispCount ==1 ) {
      //  echo "outputnamefalse";
        
    //}
   
   
   //$outputName = "teset";
  

   //print $outputName;
   //print $outputPlace;
    if ($outputName === $name and $outputPlace === $place) {
        echo "true";
    }else{
        echo "false";
    }
      }
       print "</table>";

  ?>
 


</body>
</html>