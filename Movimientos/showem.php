<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";


// Create connection
$conn =mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
if (isset($_POST['submit']))
{
    $ID = $_POST['id'];

    
$result = mysqli_query($conn, "SELECT * FROM movimiento , articulo WHERE ID_Usuario='$ID'");

echo "<table border='1'>
<tr>
<th>NºMov</th>
<th>Tipo</th>
<th>SKU</th>
<th>Nombre</th>
<th>Cantidad</th>
<th>ID_Usuario</th>
<th>Fecha_Movimiento</th>
</tr>";

while ($row=mysqli_fetch_array($result)) {
    
    echo "<tr>";
    echo "<td>" . $row['Numero_Mov'] . "</td>";
    echo "<td>" . $row['Tipo_Mov'] . "</td>";
    echo "<td>" . $row['SKU'] . "</td>";
    echo "<td>" . $row['Nombre'] . "</td>";
    echo "<td>" . $row['Cantidad'] . "</td>";
    echo "<td>" . $row['ID_Usuario'] . "</td>";
    echo "<td>" . $row['Fecha_Movimiento'] . "</td>";
     
    echo "</tr>";
}


echo "</table>";
}

mysqli_close($conn);

echo <<< HTML

<html>
    <head>
        <meta charset="UTF-8">
        <title>sample</title>
    </head>
    <body>
      <div class="container">
        <form action="showem.php" method = "POST">
          <p>
            ID:     <input type="text" name="id"><br>
          <input type ="submit" name="submit" value="send to database"> </input>
          </p>
        </form>
        <a href="http://localhost/IntelVentory/menu.php"><button class="menu">Menu</button></a>

      </div>

    </body>

<style>
body {
  font: 13px/20px 'Lucida Grande', Tahoma, Verdana, sans-serif;
  color: #404040;
  background: #0ca3d2;
}
p{
  margin-left: 2em;
}
input[type=text], input[type=password], input[type=date] , input[type=email]{
  margin: 5px;
  padding: 0 10px;
  width: 200px;
  height: 34px;
  color: #404040;
  background: white;
  border: 1px solid;
  border-color: #c4c4c4 #d1d1d1 #d4d4d4;
  border-radius: 2px;
  outline: 5px solid #eff4f7;
  -moz-outline-radius: 3px; // Can we get this on WebKit please?
  @include box-shadow(inset 0 1px 3px rgba(black, .12));
}
.container{
  background-color: white;
margin: 80px auto;
border: 2px solid transparent;
border-radius: 25px;

  width: 640px;
}
.menu{
  position: relative;
      top: -2em;
    left: 20em;
  padding: 0 18px;
  height: 29px;
  font-size: 12px;
  font-weight: bold;
  color: #527881;
  text-shadow: 0 1px #e3f1f1;
  background: #cde5ef;
  border: 1px solid;
  border-color: #b4ccce #b3c0c8 #9eb9c2;
  border-radius: 16px;
  outline: 0;
  @include box-sizing(content-box); // Firefox sets this to border-box by default
  @include linear-gradient(top, #edf5f8, #cde5ef);
  @include box-shadow(inset 0 1px white, 0 1px 2px rgba(black, .15));
}
input[type=submit] {
  position: relative;
  top:1.5em;
  padding: 0 18px;
  height: 29px;
  font-size: 12px;
  font-weight: bold;
  color: #527881;
  text-shadow: 0 1px #e3f1f1;
  background: #cde5ef;
  border: 1px solid;
  border-color: #b4ccce #b3c0c8 #9eb9c2;
  border-radius: 16px;
  outline: 0;
  @include box-sizing(content-box); // Firefox sets this to border-box by default
  @include linear-gradient(top, #edf5f8, #cde5ef);
  @include box-shadow(inset 0 1px white, 0 1px 2px rgba(black, .15));}
</style>
</html> 
HTML;
?>