<?php

    $servername = "zjc353.encs.concordia.ca";
    $username = "zjc353_1";
    $password = "DTFSK354";
    $database = "zjc353_1";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
  
    function test()
    {
        global $conn;
        
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
    }

  


?>