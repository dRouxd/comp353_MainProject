<!DOCTYPE html>
<html lang="en">
<head>
<title>Person Edit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>

<?php include 'head.php'; ?>
<?php include 'mysql_queries.php'; ?>

<?php

$person_id = $_GET["person"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    header("Location: person_details.php?person=" . $person_id);
}

# TODO: Get person data from mysql
$person = 
[
    "person_id" => 2,
    "ssn" => "666999888",
    "fname" => "Johnny",
    "lname" => "Smithy",
    "date_of_birth" => "1980-07-31",
    "age" => 41,
    "medicare_card_number" => "SMIY 8007 3132",
    "telephone" => "987-765-6543",
    "email" => "johnny.smithy@gmail.com",
    "address" => "123 mapple street",
    "city" => "Montreal",
    "province" => "QC",
    "postal_code" => "1q2w3e",
    "citizenship" => "Canadian"
];

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

<form class="inForm" action="/person_edit.php?person=<?php print($person_id); ?>"  method="post">
    <input type="hidden" id="person_id" name="person_id" value="<?php print($person_id); ?>">
    <p class="inForm">
        <label class="inForm" for="SSN">SSN: </label>
        <input class="inForm" name="SSN" id="SSN" type="text" value="<?php print($person["ssn"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="fname">First Name: </label>
        <input class="inForm" name="fname" id="fname" type="text" value="<?php print($person["fname"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="lname">Last Name: </label>
        <input class="inForm" name="lname"  id="lname" type="text" value="<?php print($person["lname"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="date_of_birth">Date of Birth: </label>
        <input class="inForm" name="date_of_birth"  id="date_of_birth" type="date" value="<?php print($person["date_of_birth"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="medicare_card_number">Medicare Card Number: </label>
        <input class="inForm" name="medicare_card_number" id="medicare_card_number" type="text" value="<?php print($person["medicare_card_number"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="telephone">Telephone: </label>
        <input class="inForm" name="telephone"  id="telephone" type="text" value="<?php print($person["telephone"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="email">Email: </label>
        <input class="inForm" name="email"  id="email" type="text" value="<?php print($person["email"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="address">Address: </label>
        <input class="inForm" name="address"  id="address" type="text" value="<?php print($person["address"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="city">City: </label>
        <input class="inForm" name="city"  id="city" type="text" value="<?php print($person["city"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="province">Province: </label>
        
        <select class="inForm" name="province" id="province">
<?php
foreach($provinces as $p)
{
    if($p == $person["province"])
    {
?>           <option value="<?php print($p); ?>" selected="selected"><?php print($p); ?></option>
<?php   
    }else
    {
?>           <option value="<?php print($p); ?>"><?php print($p); ?></option>
<?php
    }
}
?>
        </select>
    </p>
    <p class="inForm">
        <label class="inForm" for="postal_code">Postal Code: </label>
        <input class="inForm" name="postal_code"  id="postal_code" type="text" value="<?php print($person["postal_code"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="citizenship">Citizenship: </label>
        <input class="inForm" name="citizenship"  id="citizenship" type="text" value="<?php print($person["citizenship"]); ?>">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










