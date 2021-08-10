<?php include 'mysql_queries.php'; ?>
<?php
if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    $provinces = getListProvince();

    foreach($provinces as $p)
    {
        $province = $p["province"];
	$age_group_number = $_POST[$province];
        $sqlupdate="update Province_Eligibility set age_group_number=".$age_group_number." where province='".$province."'";

        updateProvince($sqlupdate);
    }
    header("Location: province_eligibility.php?agn=".$age_group_number);
    die();
}

$provinces = [
    ["province" => "AB", "age_group_number" => "4"],
    ["province" => "BC", "age_group_number" => "5"],
    ["province" => "MB", "age_group_number" => "7"],
    ["province" => "NB", "age_group_number" => "4"],
    ["province" => "NL", "age_group_number" => "6"],
    ["province" => "NS", "age_group_number" => "9"],
    ["province" => "NT", "age_group_number" => "2"],
    ["province" => "NU", "age_group_number" => "4"],
    ["province" => "ON", "age_group_number" => "7"],
    ["province" => "PE", "age_group_number" => "5"],
    ["province" => "QC", "age_group_number" => "6"],
    ["province" => "SK", "age_group_number" => "8"],
    ["province" => "YT", "age_group_number" => "9"]
];

$provinces = getListProvince();

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
<form class="inForm" action="province_eligibility_edit.php"  method="post">
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
            <td><input class="inForm" name="<?php print($p["province"]); ?>" type="number" value="<?php print($p["age_group_number"]); ?>" min="1" max="10"></td>
        </tr>
<?php
}
?>
    
    </table>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>
