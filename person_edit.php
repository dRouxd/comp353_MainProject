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



?>

<form class="inForm">
    <p class="inForm">
        <label class="inForm" for="SSN">SSN: </label>
        <input class="inForm" name="SSN" id="SSN" type="text" value="test">
    </p>
    <p class="inForm">
        <label class="inForm" for="fname">First Name: </label>
        <input class="inForm" name="" id="fname" type="text" value="test">
    </p>
    <p class="inForm">
        <label class="inForm" for="lname">Last Name: </label>
        <input class="inForm" name=""  id="lname" type="text" value="test">
    </p>
    <p class="inForm">
        <label class="inForm" for="date_of_birth">Date of Birth: </label>
        <input class="inForm" name="date_of_birth"  id="date_of_birth" type="text" value="test">
    </p>
    <p class="inForm">
        <label class="inForm" for="medicare_card_number">Medicare Card Number: </label>
        <input class="inForm" name="medicare_card_number" id="medicare_card_number" type="text" value="test">
    </p>
    <p class="inForm">
        <label class="inForm" for="telephone">Telephone: </label>
        <input class="inForm" name="telephone"  id="telephone" type="text" value="test">
    </p>
    <p class="inForm">
        <label class="inForm" for="email">Email: </label>
        <input class="inForm" name="email"  id="email" type="text" value="test">
    </p>
    <p class="inForm">
        <label class="inForm" for="address">Address: </label>
        <input class="inForm" name="address"  id="address" type="text" value="test">
    </p>
    <p class="inForm">
        <label class="inForm" for="city">City: </label>
        <input class="inForm" name="city"  id="city" type="text" value="test">
    </p>
    <p class="inForm">
        <label class="inForm" for="">Province: </label>
        <input class="inForm" name=""  id="" type="text" value="test">
    </p>
    <p class="inForm">
        <label class="inForm" for="postal_code">Postal Code: </label>
        <input class="inForm" name="postal_code"  id="postal_code" type="text" value="test">
    </p>
    <p class="inForm">
        <label class="inForm" for="citizenship">Citizenship: </label>
        <input class="inForm" name="citizenship"  id="citizenship" type="text" value="test">
    </p>
</form>

<?php include 'tail.php'; ?>










