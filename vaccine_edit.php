<?php include 'mysql_queries.php'; ?>
<?php
$vaccine_id = $_GET["vaccine_id"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    $brand=$_POST['brand'];
    $current_status=$_POST['current_status'];
    $approval_date=$_POST['approval_date'];
    $suspended_date=$_POST['suspended_date'];
    $description =$_POST['description'];

    $sqlupdate="update Vaccine set brand='".$brand."', current_status='".$current_status."', approval_date='".$approval_date."', suspended_date='".$suspended_date."', description='".$description."' where vaccine_id='".$vaccine_id."'";

    updateVaccine($sqlupdate);

    header("Location: vaccine_detail.php?vaccine_id=" . $vaccine_id);
    die();
}

# TODO: Get vaccine data from mysql
$vaccine = 
[
    "vaccine_id" => 1,
    "brand" => "moderna",
    "current_status" => "APPROVED",
    "description" => "moderna description"
];

$vaccine=getVaccineById($vaccine_id); 

# TODO: Get history received from mysql
$histories = 
[
    ["status" => "TESTING", "approved_date" => "2021-01-01", "end_date" => "2021-03-01"],
    ["status" => "APPROVED", "approved_date" => "2021-03-01", "end_date" => "null"]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Vaccine Edit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<p>
<a href="vaccine_delete.php?confirm=false&vaccine_id=<?php print($vaccine_id); ?>">Delete</a>
</p>

<h3>Edit Details</h3>
<form class="inForm" action="vaccine_edit.php?vaccine_id=<?php print($vaccine_id); ?>"  method="post">
    <p class="inForm">
        <label class="inForm" for="brand">Brand: </label>
        <input class="inForm" name="brand" id="brand" type="text" value="<?php print($vaccine["brand"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="current_status">Current Status: </label>
        <input class="inForm" name="current_status" id="current_status" type="text" value="<?php print($vaccine["current_status"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="approval_date">Approval Date: </label>
        <input class="inForm" name="approval_date" id="approval_date" type="date" value="<?php print($vaccine["approval_date"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="suspended_date">Suspended Date: </label>
        <input class="inForm" name="suspended_date" id="suspended_date" type="date" value="<?php print($vaccine["suspended_date"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="description">Description: </label>
        <input class="inForm" name="description" id="description" type="text" value="<?php print($vaccine["description"]); ?>">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<h3>History</h3>
<table class="default">
    <tr class="default">
        <th class="default">Status</th>
        <th class="default">Approved Date</th>
        <th class="default">End Date</th>
    </tr>
<?php
foreach($histories as $history)
{
?>
    <tr class="default">
        <td class="default"><?php print($history["status"]); ?></td>
        <td class="default"><?php print($history["approved_date"]); ?></td>
        <td class="default"><?php print($history["end_date"]); ?></td>
    </tr>
<?php   
}
?>
</table>
<p>
<a href="vaccine_history_add.php?vaccine_id=<?php print($vaccine_id); ?>">Add History</a>
</p>

<?php include 'tail.php'; ?>










