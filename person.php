<?php include 'mysql_queries.php'; ?>
<?php

$listPeople = getListPerson();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Person</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>
<h3>Person</h3>
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

foreach($listPeople as $person)
{
?>  <tr class="default">
        <td class="default"><?php print($person["firstName"]); ?></td>
        <td class="default"><?php print($person["lastName"]); ?></td>
        <td class="default"><?php print($person["DOB"]); ?></td>
        <td class="default"><?php print($person["age"]); ?></td>
        <td class="default"><?php print($person["medicareCardNumber"]); ?></td>
        <td class="default"><?php print($person["mobileNumber"]); ?></td>
        <td class="default"><?php print($person["email"]); ?></td>
        <td class="default"><a href="person_detail.php?person_id=<?php print($person["person_id"]); ?>">Details</a> <a href="person_edit.php?person_id=<?php print($person["person_id"]); ?>">Edit</a></td>
    </tr>
<?php
}

?>
</table>
<p>
<a href="person_add.php">Add Person</a>
</p>

<?php include 'tail.php'; ?>