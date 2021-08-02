<?php include 'mysql_queries.php'; ?>
<?php
if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    header("Location: age_group.php");
    die();
}

$provinces = [
    ["province" => "AB", "ageGroupNumber" => "4"],
    ["province" => "BC", "ageGroupNumber" => "5"],
    ["province" => "MB", "ageGroupNumber" => "7"],
    ["province" => "NB", "ageGroupNumber" => "4"],
    ["province" => "NL", "ageGroupNumber" => "6"],
    ["province" => "NS", "ageGroupNumber" => "9"],
    ["province" => "NT", "ageGroupNumber" => "2"],
    ["province" => "NU", "ageGroupNumber" => "4"],
    ["province" => "ON", "ageGroupNumber" => "7"],
    ["province" => "PE", "ageGroupNumber" => "5"],
    ["province" => "QC", "ageGroupNumber" => "6"],
    ["province" => "SK", "ageGroupNumber" => "8"],
    ["province" => "YT", "ageGroupNumber" => "9"]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Province Eligibility Edit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<h3>Province Eligibility Edit</h3>
<form class="inForm" action="/province_eligibility.php"  method="post">
    <table>
        <tr>
            <th>Province</th>
            <th>Age Group Number</th>
        </tr>
    
<?php
foreach($provinces as $p)
{
?>
        <tr>
            <td><?php print($p["province"]); ?> </td>
            <td><input class="inForm" name="<?php print($age["province"]); ?>" type="number" value="<?php print($p["ageGroupNumber"]); ?>"></td>
        </tr>
<?php
}
?>
    
    </table>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










