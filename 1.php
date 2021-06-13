<html>
<head><title>Random</title></head>
<body style="background-color: black;color: yellow;">
<h2><p>Enter the random number <?php
    $choice = rand(1,100);
    echo $choice;
?>.</p><p>The Square Root of this number is <?php
    echo sqrt($choice);
?>.</p></h2>
</body>
</html>