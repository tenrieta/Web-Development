<?php
$title = "За нас";
	$con = mysqli_connect('127.0.0.1','root','');
	if(!$con)
	{
		echo 'Not connected to Server';
	}
	if(!mysqli_select_db($con,'mysite'))
	{
		echo 'Database Not Selected';
	}
	$query=mysqli_query($con,'SELECT * FROM person');
$rows = mysqli_num_rows($query);
$arr = '';
for($i=0; $i<$rows; $i++)
{
	if($i==0)
	{
		$arr .= '<ul>';
	}
	$row = mysqli_fetch_array($query);
	$arr .= '<li><i>';
	$arr .= $row["Message"];
	$arr .= '</li></i>';
	if($i==$rows-1)
	{
		$arr .= '</ul>';
	}
    if($i!=$rows-1)
	{
		$arr .= '---------------------------------------';
	}
	$arr .= '</br>';
}

$content = '
<h2 class="alignleft"> Моля, ако искате да оставите мнение или препоръка за нас, </br> попълнете формата:</h2>
<h2 class="alignright"><i>Мнения на други читатели : </i></h2>
<form action="about.php" method="post">
		Име:      	<input type = "text" name="username" placeholder="Иван Иванов">
				<br/> <br/>
		Имейл: <input type = "text" name="email" placeholder="primer@mail.com">
				<br/><br/>
				
		Съобщение: <textarea name = "message" name="message" placeholder="Моля уточнете..."/></textarea>
				<br/>
				<input type = "submit" value="Изпрати" style="font-size : 20px">
</form> 
<div class="ex1">';
$content .=  $arr;
$content .=  "</br>";
$content .= '</div>';

	$Name = '';
	$Email = '';
    $Message = '';
    if(isset($_POST['username']) or isset($_POST['email']) or isset($_POST['message']))
	{
		$Name = $_POST['username'];
		$Email = $_POST['email'];
		$Message = $_POST['message'];
		$sql = "INSERT INTO person(Name,Email,Message) VALUES('$Name','$Email','$Message')";
		if(!mysqli_query($con,$sql))
		{
			echo 'Not inserted';
		}
		else
		{
			header("location:thank.php");
			exit();
		}
	}
	include 'Template.php';
	header("refresh:2,url:about.php");
?>