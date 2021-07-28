<?php

  $servername = "localhost";
  $username = "zjc353_1";
  $password = "DTFSK354";

  function test()
  {
    try 
    {
      $conn = new PDO("mysql:host=$servername;dbname=zjc353_1", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
    } catch(PDOException $e)
    {
      echo "Connection failed: " . $e->getMessage();
    }
    
    $sql = "SELECT person_id, fname, lname FROM Person";


    if ($result->num_rows > 0) 
    {
      // output data of each row
      while($row = $result->fetch_assoc())
      {
        echo "id: " . $row["person_id"]. " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
      }
    } else
    {
      echo "0 results";
    }


    $conn = null;
  }

  


?>