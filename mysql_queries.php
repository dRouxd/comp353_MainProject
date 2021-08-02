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
  
    function test_query($sql)
    {
        global $conn;
        
        $result = $conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function question_12()
    {
        global $conn;
        $sql = "";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function question_13()
    {
        global $conn;
        $sql = "";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function question_14()
    {
        global $conn;
        $sql = "";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function question_15()
    {
        global $conn;
        $sql = "";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function question_16()
    {
        global $conn;
        $sql = "";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function question_17()
    {
        global $conn;
        $sql = "";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function question_18()
    {
        global $conn;
        $sql = "";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function question_19()
    {
        global $conn;
        $sql = "";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function question_20()
    {
        global $conn;
        $sql = "";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
  
    function getListPerson()
    {
        global $conn;
        
        $sql = "SELECT person_id, fname, lname, date_of_birth, age, medicare_card_number, telephone, email FROM Person";
        
        $result = $conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
  
  

?>