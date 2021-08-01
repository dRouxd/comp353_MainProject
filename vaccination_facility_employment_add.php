<?php include 'mysql_queries.php'; ?>
<?php
$facility_id = $_GET["facility_id"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    header("Location: vaccination_facility_edit.php?facility_id=" . $facility_id);
    die();
}

$healthWorkers = [
    ["eid" => "1", "name" => "Matilda Grouch"],
    ["eid" => "2", "name" => "Joe Beau"]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Vaccination Facility Employment Add</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>


<h3>Add Vaccination Facility Employment</h3>
<form class="inForm" action="/vaccination_facility_employment_add.php?facility_id=<?php print($facility_id); ?>"  method="post">
    <p class="inForm">
        <label class="inForm" for="health_worker">Health Worker: </label>
        <select class="inForm" name="health_worker" id="health_worker">
<?php
foreach($healthWorkers as $h)
{
?>           <option value="<?php print($h["eid"]); ?>"><?php print($h["name"]); ?></option>
<?php
}
?>
        </select>
    </p>
    <p class="inForm">
        <label class="inForm" for="start_date">Start Date: </label>
        <input class="inForm" name="start_date" id="start_date" type="date">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










