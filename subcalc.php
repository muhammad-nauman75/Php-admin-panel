<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Subscription</title>
    <style>
      h1 {
        text-align: center;
        padding: 20px;
        background-color: grey;
      }
      p,
      h2 {
        font-size: 25px;
      }
      small {
        color: grey;
        font-size: 12px;
      }
      input,
      button {
        font-size: 20px;
        padding: 10px;
      }
      .warning{
        color: red;
        font-size: 15px;
      }
    </style>
  </head>
  <body>
  <h1>Kloud AB</h1>    
  <h2>Price Calculator</h2>
  <form action="subcalc.php" method="GET">
    <input type="text" name="gbs" placeholder="Enter required Gbs" />
    <button type="submit" name="submit">Calculate</button>
  </form>

<?php
  if(isset($_GET['submit'])){
    $gbs = $_GET['gbs'];

    //Error Checks---------------------
    if(empty($gbs)){
      echo '<p class="warning"> * Please enter Required Storage </p>';
    } elseif (is_numeric($gbs) == false){
      echo '<p class="warning"> * Please Enter value in numbers </p>';
    }
    else
    {
      
    
      //Gbs Calculator --------------------------
  function subCalc($gb){
    if($gb <= 100){
      return $gb *5; 
         
      
    } elseif ($gb > 100 && $gb <= 200) {
      $x = (100 * 5) + (($gb - 100)* 3);    
       
        
    } elseif ($gb > 200 && $gb <= 300) {
      return (100 * 5) + (100* 3) + (($gb - 200)* 2);   
        
    } else{
      return  (100 * 5) + (100 * 3) + (100 * 2) + ($gb - 300);     
    }
    
  }

    //  VAT Calculator---------------------
    function moms($m){
    return subCalc($m)*.25;
  }
    $finalPrice = subCalc($gbs) + moms($gbs);

    //  OUTPUT---------------------------
    echo '<p>Required Storage in Gbs  -------- ' . $gbs. ' Gbs</p>';
    echo '<p>Price <small>Without VAT</small> ----------------------- '.subCalc($gbs). ' SEK</p>';
    echo '<p>VAT --------------------------------- ' .moms($gbs).' SEK</p>' ;
    echo '<p>Total Price <small>With VAT</small> ------------------ '.$finalPrice. ' SEK</p>';
  }
}

?>             
    
  </body>
</html>


