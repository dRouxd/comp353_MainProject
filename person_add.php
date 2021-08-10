<?php include 'mysql_queries.php'; ?>
<?php


if(array_key_exists("save", $_POST))
{
    #TODO: Send the new person data to the mysql and get id back
    $ssn=$_POST['ssn'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $age_group=$_POST['age_group'];
    $medicare_card_number=$_POST['medicare_card_number'];
    $telephone=$_POST['telephone'];
    $citizenship=$_POST['citizenship'];
    $date_of_birth=$_POST['date_of_birth'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $province=$_POST['province'];
    $postal_code=$_POST['postal_code'];
    $email=$_POST['email'];
    $age_group=$_POST['age_group'];
    

    //$sqlinsert="insert into Person(ssn, fname, lname, age_group, medicare_card_number, telephone, citizenship) values('{$ssn}', '{$fname}', '{$lname}', '{$age_group}', '{$medicare_card_number}', '{$telephone}', '{$citizenship}')";

    $sqlinsert="insert into Person(ssn, fname, lname, date_of_birth, medicare_card_number, telephone, address, city, province, postal_code, citizenship, email, age_group) values('{$ssn}', '{$fname}', '{$lname}', '{$date_of_birth}', '{$medicare_card_number}', '{$telephone}', '{$address}', '{$city}', '{$province}', '{$postal_code}', '{$citizenship}', '{$email}', '{$age_group}')";

    $personlist = addPerson($sqlinsert);

    //foreach($personlist as $person)
    //{
       $person_id = $personlist["person_id"];
    //}
    
    //$person_id = 1;
    header("Location: person_edit.php?person_id=" . $person_id);
    die();
}

# TODO: Get provinces from Mysql
$provinces = [
    "AB",
    "BC",
    "MB",
    "NB",
    "NL",
    "NS",
    "NT",
    "NU",
    "ON",
    "PE",
    "QC",
    "SK",
    "YT"
]

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Person</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>
<h3>Details</h3>
<form class="inForm" action="person_add.php"  method="post">
    <p class="inForm">
        <label class="inForm" for="ssn">SSN: </label>
        <input class="inForm" name="ssn" id="ssn" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="fname">First Name: </label>
        <input class="inForm" name="fname" id="fname" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="lname">Last Name: </label>
        <input class="inForm" name="lname"  id="lname" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="date_of_birth">Date of Birth: </label>
        <input class="inForm" name="date_of_birth"  id="date_of_birth" type="date">
    </p>
    <p class="inForm">
        <label class="inForm" for="age_group">Age Group: </label>
        <input class="inForm" name="age_group" id="age_group" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="medicare_card_number">Medicare Card Number: </label>
        <input class="inForm" name="medicare_card_number" id="medicare_card_number" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="telephone">Telephone: </label>
        <input class="inForm" name="telephone"  id="telephone" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="email">Email: </label>
        <input class="inForm" name="email"  id="email" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="address">Address: </label>
        <input class="inForm" name="address"  id="address" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="city">City: </label>
        <input class="inForm" name="city"  id="city" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="province">Province: </label>
        
        <select class="inForm" name="province" id="province">
<?php
foreach($provinces as $p)
{
?>           <option value="<?php print($p); ?>"><?php print($p); ?></option>
<?php
}
?>
        </select>
    </p>
    <p class="inForm">
        <label class="inForm" for="postal_code">Postal Code: </label>
        <input class="inForm" name="postal_code"  id="postal_code" type="text">
    </p>
    <p class="inForm">
        <label class="inForm" for="citizenship">Citizenship: </label>
        <input class="inForm" name="citizenship"  id="citizenship" type="text">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










