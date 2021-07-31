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

<table class="default">
    <tr class="default">
        <th class="default">First Name</th>
        <th class="default">Last Name</th>
        <th class="default">Date of Birth</th>
        <th class="default">Age</th>
        <th class="default">Medicare Number</th>
        <th class="default">Phone</th>
        <th class="default">Email</th>
    </tr>

<?php

$listPeople = [[
    "person_id" => 1,
    "fname" => "John",
    "lname" => "Smith",
    "date_of_birth" => "1990-07-31",
    "age" => 31,
    "medicare_card_number" => "SMIJ 9007 3132",
    "telephone" => "123-345-4567",
    "email" => "john.smith@gmail.com"
],
[
    "person_id" => 2,
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
?>  <tr class="default">
        <td class="default"><?php print($person["fname"]); ?></td>
        <td class="default"><?php print($person["lname"]); ?></td>
        <td class="default"><?php print($person["date_of_birth"]); ?></td>
        <td class="default"><?php print($person["age"]); ?></td>
        <td class="default"><?php print($person["medicare_card_number"]); ?></td>
        <td class="default"><?php print($person["telephone"]); ?></td>
        <td class="default"><?php print($person["email"]); ?></td>
        
<?php
    $detailsLink = "person_details.php?person_id=" . $person["person_id"];
    $editLink = "person_edit.php?person_id=" . $person["person_id"];
?>      <td class="default"><a href="<?php print($detailsLink); ?>">Details</a> <a href="<?php print($editLink); ?>">Edit</a></td>
    </tr>
<?php
}

?>

</table>

<?php test(); ?>


<?php include 'tail.php'; ?>