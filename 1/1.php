<?php header('Content-type: text/html; charset=utf-8');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
echo "Первое задание<br><br>";

echo "<table border='1'>";
echo "<thead>";
echo "<tr>";
echo "<th> колонка1</th>";
echo "<th> колонка2</th>";
echo "<th> колонка3</th>";
echo "<th> колонка4</th>";
echo "<th> колонка5</th>";
echo "<th> колонка6</th>";
echo "<th> колонка7</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
$num=array(1,5,2,7,35,8,9,56,24);
$count=7;
//длинна массива
$l=count($num);
//кратно 7
while ($l%7>0) {
	$l++;
	array_push($num, " ");
}
echo "<tr>";
for ($i=1; $i <=$l ; $i++) { 
	echo "<td>".$num[$i-1]."</td>";
	if (($i%$count)==0) {
		echo "</tr><tr>";
	}
}
echo "</tr>";

echo "</tbody>";
echo "</table>";


?>

</body>
</html>