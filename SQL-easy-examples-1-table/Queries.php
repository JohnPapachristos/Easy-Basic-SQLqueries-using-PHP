<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
        require('data.php');    
		$con = mysqli_connect($server,$username,"",$db_name);
		if (!$con){
			echo "problem in the connection".mysqli_error();
		}
		else{
			 $db_select = mysqli_select_db($con, $db_name);
			if (!$db_select) {
				die("Database selection failed: " . mysqli_connect_error());
			}
            //Print the first 10 male names Asc order
            $gender='Male';
			echo "A) Print the first 10 male names Asc order:"."<br>"."<br>";
			$x=mysqli_query($con,"SELECT first_name, last_name FROM mock_data WHERE gender='$gender' order by first_name ASC limit 10");
			$count=0;
			while($row = mysqli_fetch_row($x)){
				$count++;
				echo $count.") ".$row[0]." ".$row[1]."<br>";
			}
			
			//Print the first 10 female names Desc order
            $gender='Female';
			echo "<br>"."<br>"."B) Print the first 10 female names Desc order:"."<br>"."<br>";
			$x=mysqli_query($con,"SELECT first_name, last_name FROM mock_data WHERE gender='$gender' order by first_name DESC limit 10");
			$count=0;
			while($row = mysqli_fetch_row($x)){
				$count++;
				echo $count.") ".$row[0]." ".$row[1]."<br>";
			}
			
			//Print the first 10 males and Bigender names and emails
            $gender1='Male';
			$gender2='Bigender';
			echo "<br>"."<br>"."C) Print the first 10 males and Bigender names and emails:"."<br>"."<br>";
			$x=mysqli_query($con,"SELECT first_name, last_name, email FROM mock_data WHERE gender='$gender1' or gender='$gender2' limit 10");
			$count=0;
			while($row = mysqli_fetch_row($x)){
				$count++;
				echo $count.") ".$row[0]." ".$row[1]." ".$row[2]."<br>";
			}
			
			//Print the first 20 genders except Non-binary
            $gender='Non-binary';
			echo "<br>"."<br>"."D) Print the first 20 genders except Non-binary:"."<br>"."<br>";
			$x=mysqli_query($con,"SELECT * FROM mock_data except SELECT * FROM mock_data WHERE gender='$gender' limit 20");
			$count=0;
			while($row = mysqli_fetch_row($x)){
				$count++;
				echo $count.") ".$row[0]." ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4]."<br>";
			}
		}
		
	?>
</body>
</html>