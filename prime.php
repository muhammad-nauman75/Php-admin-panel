<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
  <title>Prime Number</title>
</head>
<body>
<form action="prime.php" method="GET">

<div class="form-group">
    <label for="number">Enter any number:</label>
    <input  type="number" name="number">
    <button class="btn btn-dark" type="submit" name="submit">Check</button>
</div>
</form>
  
</body>
</html>


<?php
if(isset($_GET['submit'])){
  $number = $_GET['number'];
  

 function prime($n)
{
 for($x=2; $x<$n; $x++)
   {
      if($n %$x ==0)
	      {
		   return 0;
		  }
    }
  return 1;
   }
   $a = prime($number);
if ($a==0)
echo '<div class="alert alert-danger" role="alert">
This is a not Prime Number.....
</div>';
else
echo '<div class="alert alert-success" role="alert">
This is a Prime Number.....
</div>';
}

?>