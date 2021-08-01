<?php include 'mysql_queries.php'; ?>
<?php
# TODO: Get employees from mysql
$healthWorkers = [
    ["eid" => "1", "name" => "Matilda Grouch"],
    ["eid" => "2", "name" => "Joe Beau"]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Health Worker</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>
<h3>Health Worker</h3>
<table class="default">
    <tr class="default">
        <th class="default">Employee ID</th>
        <th class="default">Name</th>
    </tr>

<?php
foreach($healthWorkers as $worker)
{
?>  <tr class="default">
        <td class="default"><?php print($worker["eid"]); ?></td>
        <td class="default"><?php print($worker["name"]); ?></td>
        <td class="default"><a href="health_worker_detail.php?eid=<?php print($worker["eid"]); ?>">Detail</a> <a href="health_worker_edit.php?eid=<?php print($worker["eid"]); ?>">Edit</a></td>
    </tr>
<?php
}

?>
</table>
<p>
<a href="health_worker_add.php">Add Health Worker</a>
</p>
<?php include 'tail.php'; ?>







