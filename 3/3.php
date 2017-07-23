<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="3.css">
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

<h2>Добавление категории</h2>
<form action="" method="post">
	<input type="text" name="section">
	<input type="submit" name="addsection">
</form>
<?php 
if (isset($_POST['addsection'])){
	if (($_POST['section'])=='') {
		echo "Наберите сообщение!";
	}
	elseif (($_POST['section'])!='' ) {
		$name=$_POST['section'];
		$sql3='INSERT INTO sections (name) VALUES ("' .$name. '")';
		$result3 =$db->query($sql3);
	}
	
}
?>

<h2>Добавление подкатегории</h2>
<form action="" method="post">
<select name="cat" >
	<?php
	echo "<option>Выбирите категорию</option>";
	foreach ($array1 as $row) {
	 	echo "<option value='".$row['id']."'>".$row['name']."</option>";
	 } 
	
	?>
</select>
	<input type="text" name="subsection">
	<input type="submit" name="addsubsection">
</form>
<?php 
if (isset($_POST['addsubsection'])){
	if (($_POST['subsection'])=='') {
		echo "Наберите сообщение!";
	}
	elseif (($_POST['subsection'])!='' ) {
		$name=$_POST['subsection'];
		$subid=$_POST['cat'];
		$sql4='INSERT INTO subsections (name, subid) VALUES ("' .$name. '","'.$subid.'")';
		$result4 =$db->query($sql4);
	}
	
} ?>
<script src="3.js"></script>
</body>
</html>

