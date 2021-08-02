<?php

    $servername = "132.205.96.42";
    $username = "zjc353_1";
    $password = "DTFSK354";

  
    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error)
    {
      die("Connection failed: " . $conn->connect_error);
    }
  
    function test()
    {
        $sql = "SELECT person_id, fname, lname FROM Person";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            // output data of each row
            while($row = $result->fetch_assoc())
            {
                echo "id: " . $row["person_id"]. " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
            }
        }
        else
        {
        echo "0 results";
    }


    $conn = null;
    }

  


?>