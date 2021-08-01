<?php include 'mysql_queries.php'; ?>
<?php

$facilities = [
    [
        "facility_id" => "1",
        "name" => "CHUM2",
        "address" => "123 mapple road",
        "province" => "qc",
        "phone" => "123-456-7688",
        "website" => "chum.com",
        "type" => "Hospital"
    ],
    [
        "facility_id" => "2",
        "name" => "CHUM",
        "address" => "456 mapple street",
        "province" => "qc",
        "phone" => "098-987-8765",
        "website" => "chum2.com",
        "type" => "Hospital"
    ]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Vaccination Facility</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>
<h3>Vaccination Facility</h3>
<table class="default">
    <tr class="default">
        <th class="default">Name</th>
        <th class="default">Address</th>
        <th class="default">Province</th>
        <th class="default">Phone</th>
        <th class="default">Website</th>
        <th class="default">Type</th>
    </tr>

<?php

foreach($facilities as $facility)
{
?>  <tr class="default">
        <td class="default"><?php print($facility["name"]); ?></td>
        <td class="default"><?php print($facility["address"]); ?></td>
        <td class="default"><?php print($facility["province"]); ?></td>
        <td class="default"><?php print($facility["phone"]); ?></td>
        <td class="default"><a href="<?php print($facility["website"]); ?>"><?php print($facility["website"]); ?></a></td>
        <td class="default"><?php print($facility["type"]); ?></td>
        <td class="default"><a href="vaccination_facility_detail.php?facility_id=<?php print($facility["facility_id"]); ?>">Details</a> <a href="vaccination_facility_edit.php?facility_id=<?php print($facility["facility_id"]); ?>">Edit</a></td>
    </tr>
<?php
}

?>
</table>
<p>
<a href="vaccination_facility_add.php">Add Vaccination Facility</a>
</p>

<?php include 'tail.php'; ?>