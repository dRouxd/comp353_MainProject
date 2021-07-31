<!DOCTYPE html>
<html lang="en">
<head>
<title>Person</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>

<?php include 'head.php'; ?>
<?php include 'mysql_queries.php'; ?>

<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Age</th>
        <th>Medicare Number</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Edit</th>
    </tr>

<?php

$listPeople = [[
    "fname" => "John",
    "lname" => "Smith",
    "date_of_birth" => "1990-07-31",
    "age" => 31,
    "medicare_card_number" => "SMIJ 9007 3132",
    "telephone" => "123-345-4567",
    "email" => "john.smith@gmail.com"
],
[
    "fname" => "Johnny",
    "lname" => "Smithy",
    "date_of_birth" => "1980-07-31",
    "age" => 41,
    "medicare_card_number" => "SMIY 8007 3132",
    "telephone" => "987-765-6543",
    "email" => "johnny.smithy@gmail.com"
]];

foreach($listPeople as $person)
{
?>  <tr>
<?php
    foreach($person as $k=>$v)
    {
?>
        <td><?php print($v); ?></td>
        <?php
    }
?>      <td></td>
    </tr>
<?php
}

?>

</table>

<?php test(); ?>


<?php include 'tail.php'; ?>