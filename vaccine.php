<?php include 'mysql_queries.php'; ?>
<?php
$listVaccine = [
    [
        "vaccine_id" => 1,
        "brand" => "moderna",
        "current_status" => "APPROVED",
        "description" => "moderna description"
    ],
    [
        "vaccine_id" => 2,
        "brand" => "pfizer",
        "current_status" => "APPROVED",
        "description" => "pfizer description"
    ]
];
$listVaccine = getListVaccine();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Vaccine</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<h3>Vaccine</h3>
<table class="default">
    <tr class="default">
        <th class="default">Brand</th>
        <th class="default">Current Status</th>
        <th class="default">Approval Date</th>
        <th class="default">Suspended Date</th>
        <th class="default">Description</th>
    </tr>

<?php
foreach($listVaccine as $vaccine)
{
?>  <tr class="default">
        <td class="default"><?php print($vaccine["brand"]); ?></td>
        <td class="default"><?php print($vaccine["current_status"]); ?></td>
        <td class="default"><?php print($vaccine["approval_date"]); ?></td>
        <td class="default"><?php print($vaccine["suspended_date"]); ?></td>
        <td class="default"><?php print($vaccine["description"]); ?></td>
        <td class="default"><a href="vaccine_detail.php?vaccine_id=<?php print($vaccine["vaccine_id"]); ?>">Detail</a> <a href="vaccine_edit.php?vaccine_id=<?php print($vaccine["vaccine_id"]); ?>">Edit</a></td>
    </tr>
<?php
}

?>
</table>
<p>
<a href="vaccine_add.php">Add Vaccine</a>
</p>
<?php include 'tail.php'; ?>







