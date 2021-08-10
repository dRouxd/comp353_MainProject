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
        
        $sql = "SELECT person_id, ssn, fname, lname, date_of_birth, age_group, medicare_card_number, telephone, email FROM Person";
        
        $result = $conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function getPersonById($person_id)
    {
        global $conn;
        
        $sql = "SELECT person_id, ssn, fname, lname, date_of_birth, age_group, medicare_card_number, telephone, email, address, city, province, postal_code, citizenship FROM Person where person_id=" . $person_id;
        
        $result = $conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
  
    function addPerson($sqlinsert)
    {
        global $conn;
        
        $result=$conn->query($sqlinsert);

	//$sqlselect="select * from Person order by person_id DESC"
	$sqlselect="select max(person_id) as person_id from Person";

        $result = $conn->query($sqlselect);

        return $result->fetch_assoc();

    }

    function updatePerson($sqlupdate)
    {
        global $conn;
        
        $result = $conn->query($sqlupdate);

	$sqlselect="select max(person_id) as person_id from Person";

        $result = $conn->query($sqlselect);

        return $result->fetch_assoc();

    }

    function getListVaccine()
    {
        global $conn;
        
        $sql = "SELECT vaccine_id, brand, approval_date, current_status, suspended_date, description FROM Vaccine";
        
        $result = $conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function getVaccineById($vaccine_id)
    {
        global $conn;
        
        $sql = "SELECT vaccine_id, brand, approval_date, current_status, suspended_date, description FROM Vaccine where vaccine_id='".$vaccine_id."'";
        
        $result = $conn->query($sql);

        return $result->fetch_assoc();
    }

    function addVaccine($sqlinsert)
    {
        global $conn;
        
        $result=$conn->query($sqlinsert);

	$sqlselect="select max(vaccine_id) as vaccine_id from Vaccine";

        $result = $conn->query($sqlselect);

        return $result->fetch_assoc();

    }

    function updateVaccine($sqlupdate)
    {
        global $conn;
        
        $result = $conn->query($sqlupdate);

	$sqlselect="select max(vaccine_id) as vaccine_id from Vaccine";

        $result = $conn->query($sqlselect);

        return $result->fetch_assoc();

    }
  
    function getListAgeGroup()
    {
        global $conn;
        
        $sql = "SELECT age_group_number, lower_bound, upper_bound FROM age_group";
        
        $result = $conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function getAgeGroupByNum($age_group_number)
    {
        global $conn;
        
        $sql = "SELECT age_group_number, lower_bound, upper_bound FROM age_group where age_group_number='".$age_group_number."'";
        
        $result = $conn->query($sql);

        return $result->fetch_assoc();
    }

    function updateAgeGroup($sqlupdate)
    {
        global $conn;
        
        $result = $conn->query($sqlupdate);

	$sqlselect="select max(age_group_number) as age_group_number from age_group";

        $result = $conn->query($sqlselect);

        return $result->fetch_assoc();

    }

    function getListProvince()
    {
        global $conn;
        
        $sql = "SELECT province, age_group_number FROM Province_Eligibility order by province";
        
        $result = $conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function getProvinceBy($province)
    {
        global $conn;
        
        $sql = "SELECT province, age_group_number FROM Province_Eligibility where province='".$province."'";
        
        $result = $conn->query($sql);

        return $result->fetch_assoc();
    }

    function updateProvince($sqlupdate)
    {
        global $conn;
        
        $result = $conn->query($sqlupdate);

        $sqlselect = "SELECT province, age_group_number FROM Province_Eligibility";

        $result = $conn->query($sqlselect);

        return $result->fetch_all(MYSQLI_ASSOC);

    }

?>
