<!DOCTYPE html>
<html>
<head>
	<title>a9</title>
	<script> findSelected(val)
	{
		var cat = val;
		if(cat == "parttime")
		{
			document.getElementById("hours").disabled = false;
		}
		else
		{
			document.getElementById("hours").disabled = true;
		}
	}
	</script>
</head>
<body style="background-color: black;color: yellow;">
<center>
<form method="POST">
<label>Photo</label>
<input type="file" name="photo" required>
<p><label>Employee number</label>
<input type="text" name="eno" placeholder="Employee number" required>
<p><label>First Name</label>
<input type="text" name="fname" placeholder="first name" required>
<p><label>Last Name</label>
<input type="text" name="lname" placeholder="Last name" required>
<p><label>Address</label>
<textarea name="address" placeholder="address" required></textarea>
<p><label>Gender</label>
<input type="radio" name="gender" value="male" required>Male
<input type="radio" name="gender" value="female" required>Female
<p><label>Designation</label>
<input type="text" name="desig" placeholder="Designation" required>
<p><label>Contact no</label>
<input type="number" name="phone" placeholder="contact no" required>
<p><label>Employee category</label>
<input type="radio" name="cat" value="fulltime" onchange="findSelected(this.value)">Full-Time
<input type="radio" name="cat" value="parttime" onchange="findSelected(this.value)">Part-time
<input type="radio" name="cat" value="contract" onchange="findSelected(this.value)">Contract
<p><label>Number of hours</label>
<input type="number" name="hours" value="0" placeholder="Number of hours" disabled>
<p><label>Basic salary</label>
<input type="number" name="salary" placeholder="Basic salary">
<p><input type="submit" name="submit" value="submit">
</form>
</center>
<?php
	if($_POST)
	{
		$cat = $_POST['cat'];
		$basic = $_POST['salary'];
		$salary = 0;
		$da = 0;
		$hra = 0;
		$pf = 0;
		$tax = 0;
		if($cat == 'parttime')
		{
			$hours = $_POST['hours'];
			$salary = $hours * 100;
		}
		elseif ($cat == 'fulltime') 
		{
			if($basic < 1000)
			{
				$da = $basic * 0.45;
				$hra = $basic * 0.10;
				$pf = 0;
				$tax = 0;
				$gross = $basic + $da + $hra;
				$salary = $gross - $pf - $tax;
			}
			elseif ($basic < 5000 and $basic >= 1000) 
			{
				$da = $basic * 0.75;
				$hra = $basic * 0.20;
				$pf = 1200;
				$tax = $basic * 0.05;
				$gross = $basic + $da + $hra;
				$salary = $gross - $pf - $tax;
			}
			elseif ($basic > 5000) 
			{
				$da = $basic * 0.90;
				$hra = $basic * 0.30;
				$pf = $basic * 0.05;
				$tax = $basic * 0.15;
				$gross = $basic + $da + $hra;
				$salary = $gross - $pf - $tax;
			}
		}
		elseif ($cat == 'contract') 
		{
			if($basic < 5000)
			{
				$da = 200;
				$hra = 0;
				$tax = 0;
				$gross = $basic + $da + $hra;
				$salary = $gross - $tax;
			}
			elseif ($basic > 5000 and $basic <= 25000) 
			{
				$da = $basic * 0.15;
				$hra = 1000;
				$tax = $basic * 0.03;
				$gross = $basic + $da + $hra;
				$salary = $gross - $tax;
			}
			elseif ($basic > 25000) 
			{
				$da = $basic * 0.20;
				$hra = $basic * 0.00;
				$tax = $basic * 0.09;
				$gross = $basic + $da + $hra;
				$salary = $gross - $tax;
			}
		}
		if($cat == 'parttime')
		{
			echo "<p>The basic salary is : ".$basic;
			echo "<p>The salary is : ".$salary;
		}
		elseif ($cat == 'fulltime') 
		{
			echo "<p>The basic salary is : ".$basic;
			echo "<p>The da is : ".$da;
			echo "<p>The hra is : ".$hra;
			echo "<p>The pf is : ".$pf;
			echo "<p>The tax is : ".$tax;
			echo "<p>The gross salary is : ".$gross;
			echo "<p>The net salary is : ".$salary;
		}
		elseif ($cat == 'contract') 
		{
			echo "<p>The basic salary is : ".$basic;
			echo "<p>The da is : ".$da;
			echo "<p>The hra is : ".$hra;
			echo "<p>The pf is : ".$pf;
			echo "<p>The tax is : ".$tax;
			echo "<p>The gross salary is : ".$gross;
			echo "<p>The net salary is : ".$salary;
		}
}
?>
</body>
</html>
