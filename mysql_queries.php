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
        
        $sql = "SELECT personID, firstName, lastName, DOB, age, medicareCardNumber, mobileNumber, email FROM Person";
        
        $result = $conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    function addPerson($SSN, $fname, $lname, $dob, $cardNum, $phone, $email, $address, $postalCode, $city, $province, $citizenship, $age)
    {
        global $conn;
        
        #check if the postalCode is already in the database
        $postalSql = "SELECT PostalCode FROM postalCode_Info WHERE postalCode = $postalCode";
        
        if(!($conn->query($postalSql)))
        {
            #insert postalcode into postalcodeInfo
            $postalCodeInsertSql = "INSERT INTO PostalCode_Info (postalCode, city, province) VALUES (\"$postalCode\", \"$city\", \"$province\")";
            if($conn->query($postalCodeInsertSql) !== FALSE)
            {
                print("Error: " . $conn->error);
            }
        }
        
        $insertPersonSql = "INSERT INTO Person (SSN_Passport, firstName, lastName, DOB, medicareCardNumber, mobileNumber, email, address, postalCode, citizenship, age) VALUES (\"$SSN\", \"$fname\", \"$lname\", \"$dob\", \"$cardNum\", \"$phone\", \"$email\", \"$address\", \"$postalCode\", \"$citizenship\", $age)";
        print($insertPersonSql);
        if($conn->query($insertPersonSql) !== FALSE)
        {
            print("Error: " . $conn->error);
        }
    }
  
  

?>