<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Balance Distributor</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
  </head>
  <body>
    <h1>Balance Distributor</h1>
    <form id="myForm" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
      <input id="balance" name="balance" type="text" onblur="go()" placeholder="your balance here"/>
      <input type="submit" value="Go"/><br>
    </form>
  </body>
  <script type="text/javascript">
    function go(){
      document.getElementById("myForm").submit();
    }
  </script>
  <?php
    function table($account){
      echo "<table><tr>";
      foreach(array_keys($account) as &$x) echo "<th>".ucfirst($x)."</th>";
      echo "</tr><tr>";
      foreach($account as &$x) echo "<td>$x</td>";
      echo "</tr></table>";
    }
    function distributor(){
      $account = array('normal' => .1, 'reserve' => .4, 'emergency' => .3, 'investment' => .2);
      $b = $_POST['balance'];
      if(empty($b)) {
        echo "<script>alert('Please type your balance')</script>";
        return;
      }
      foreach ($account as &$value) $value *= $b;
      table($account);
      echo "<h2>Ratios</h2>";
      foreach ($account as $key => $value) {
        echo "<p>".ucfirst($key)." ".$value."%</p>";
      }
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST') distributor();
   ?>
</html>
