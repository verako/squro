<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
	.list{
		list-style: url(plus.gif);
	}
	.vid{
		display: none;
		list-style: none;
	}

	</style>
</head>
<body>
<?php 
//print_r (SQLite3::version());

$sql1 = "SELECT * FROM sections";
$sql2 = "SELECT * FROM  subsections ";
$db = new SQLite3('tree_db.sqlite3');
$result1 =$db->query($sql1);
$array1 = array();
$result2 =$db->query($sql2);
$array2 = array();
while($data1 = $result1->fetchArray(SQLITE3_ASSOC))
{
     $array1[] = $data1;
}
while($data2 = $result2->fetchArray(SQLITE3_ASSOC))
{
     $array2[] = $data2;
}
                     
?>
<ul id="spisok">
<?php 
	foreach($array1 as $row){
        echo '<li class="list">'.$row['name'].' <a href="">close</a>';
		echo '<ul class="vid">';
		foreach ($array2 as $key) {
			if ($row['id']==$key['subid']) {
				echo "<li>".$key['name']."</li>";
			}
		}
		echo "</ul>";
		echo "</li>";
	}
?>
</ul>
<script src="3.js"></script>
</body>
</html>

