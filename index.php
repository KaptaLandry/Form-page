<?php

session_start();

    $error ="";
    $x ="";
    $y ="";
    $result2 ="";
   if(isset($_POST['operation'])){
       $x =$_POST['num1'];
       $y = $_POST['num2'];
       $op =$_POST['operation'];

       if(is_numeric($x) && is_numeric($y)){
        switch($op){
            case 'ADD' : $result = $x + $y;
              break;
            case 'SUB' : $result = $x - $y;
              break;
            case 'MULTI' : $result = $x * $y;
              break;
             case 'DIV' : $result = $x / $y;
              break;
            case 'MOD' : $result = $x % $y;
              break;
            case 'EVEN/ODD' : 
             if($y % 2 == 0)
             $result2 = "$y is an Even Number";
             else
             $result2 = "$y is an Odd Number";
              break;
            case 'FACTO' : 
             $fact =1;
             for($i=$x; $i>=1;$i--){
                 $fact *= $i;
             }
             $result = $fact;
              break;
            case 'SUMALL' : 
             $x=array(5,4,9);
             $result = array_sum($x);
              break;
            case 'ALLPRIME' : 
             $flag = 0;
             if($y == 0 || $y == 1)
             $flag = 1;
             for($j = 2; $j <= $y /2; ++$j){
                  if($y % $j == 0){
                      $flag = 1;
                      break;
                  }
             }
             if($flag == 0)
              $result2 = "$y is a Prime Number";
              else
              $result2 = "$y is not a Prime Number";
              break;
            case 'EXPO' : $result = $x ** $y;
              break;
            case 'ROOT' : 
             function nthRoot($x, $y) {
             }
             $result = pow($x, (1/$y));
              break;
            case 'LOG' : 
             $result2 = "log($x,$y) = ".log($x,$y);
              break;
            case 'GCD' : 
             $p = $x;
             $q = $y;
                 while($p != $q) {
                     if($p > $q)
                     $p =  $p - $q;
                     else
                     $q = $q - $p;
                 }
             
             $result2 ="GCD of $x and $y is : $p" ;
              break;
        }
       }else{
           $error ="Enter Number first";
       }

   }
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Calculator</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="style.css">
<body>
<header>
        <h2>Kap😎DrY</h2>
            <nav>
                <div>
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="#">ABOUT</a></li>
                        <li><a href="#">PRODUCT</a></li>
                        <li><a href="#">SERVICES</a></li>
                        <li><a href="#">CONTACT</a></li>
                    </ul>
                </div>

            </nav>

            <div>
                    <ul class="menu-member">
                        <?php
                        if (isset($_SESSION["id"])) 
                        {
                        ?>
                        <li><a href="#"><?php echo $_SESSION["Username"]; ?></a></li>
                        <li><a href="Includes/logout.inc.php" class="header-login">LOGOUT</a></li> 
                        <?php
                        }
                        else {
                            
                        ?>
                        <li><a href="#" class="header-login">LOGIN</a></li>
                        <?php
                        }
                        ?> 
                    </ul>
                </div>
        </header>

    <h1><?= $error ?></h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

<div id="n1">
     <label for="num1">Number 1:</label>
     <input type="number" name="num1" id="num1" step="0.001" value="<?= $x ?>">
</div>
     
<dvi id="n2">
     <label for="num2">Number 2:</label>
     <input type="number" name="num2" id="num2" step="0.001" value="<?= $y ?>">
</dvi>

<dvi id="result">
     <label for="rest">Result:</label>
     <input type="number"  id="result" step="0.001" value="<?= $result ?>" disabled>
</dvi>

<dvi id="result">
     <label for="rest2">Result2:</label>
     <input type="text"  id="result" value="<?= $result2 ?>" disabled>
</dvi>

<div id="ope">
 <input type="submit" value="ADD" name="operation" title="SUMMATION">
 <input type="submit" value="SUB" name="operation" title="DIFFERENCE">
 <input type="submit" value="MULTI" name="operation" title="PRODUCT">
 <input type="submit" value="DIV" name="operation" title="QUOTIENT">
 <input type="submit" value="MOD" name="operation" title="MODULUS">
 <input type="submit" value="EVEN/ODD" name="operation" title="EVEN/ODD">
 <input type="submit" value="FACTO" name="operation" title="FACTORIAL">
 <input type="submit" value="SUMALL" name="operation" title="SUMMATIONALLNUMBER">
 <input type="submit" value="ALLPRIME" name="operation" title="PRIMENUMBER">
 <input type="submit" value="EXPO" name="operation" title="EXPONENT">
 <input type="submit" value="ROOT" name="operation" title="NTHROOT">
 <input type="submit" value="LOG" name="operation" title="LOGARITHMS">
 <input type="submit" value="GCD" name="operation" title="GCD" id="gcd">
</div>

</form>
</body>
</html>