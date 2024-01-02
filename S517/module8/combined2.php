<!DOCTYPE html>  
<html lang="en">  
<head>  
<meta charset="utf-8"> 
<title>The sum of two numbers</title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<p>First Number:  <input type="text" Name="Num1"></p> 
<p>Second Number: <input type="text" Name="Num2"><p>
<input type="Submit" value="Calculate">
</form>

<?php
if (count($_POST) > 0 && isset($_POST["Num1"]) && isset($_POST["Num2"])){
    // add First and Second Numbers
    $sum = $_POST["Num1"] + $_POST["Num2"];
   
    // their sum is displayed as
    echo "The sum of the First Number (".$_POST["Num1"].") and the Second Number  (".$_POST["Num2"].") is $sum";
}
?>

</body>
</html>
    
    
