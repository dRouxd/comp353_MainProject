<?php include 'mysql_queries.php'; ?>
<?php
if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    $ageGroups=getListAgeGroup();

    foreach($ageGroups as $age)
    {
        $age_group_number = $age['age_group_number'];
        $lower_bound = $_POST["'lower_bound".$age_group_number."'"];
        $lower_bound = $_POST['lower_bound'.$age_group_number];
        $upper_bound = $_POST['upper_bound'.$age_group_number];
        $sqlupdate="update age_group set lower_bound='".$lower_bound."', upper_bound='".$upper_bound."' where age_group_number='".$age_group_number."'";

        updateAgeGroup($sqlupdate);
    }
    
    header("Location: age_group.php");
    die();
}

$ageGroups = [
    ["age_group_number" => "1", "lower_bound" => "80", "upper_bound" => "200"],
    ["age_group_number" => "2", "lower_bound" => "70", "upper_bound" => "79"],
    ["age_group_number" => "3", "lower_bound" => "60", "upper_bound" => "69"],
    ["age_group_number" => "4", "lower_bound" => "50", "upper_bound" => "59"],
    ["age_group_number" => "5", "lower_bound" => "40", "upper_bound" => "49"],
    ["age_group_number" => "6", "lower_bound" => "30", "upper_bound" => "39"],
    ["age_group_number" => "7", "lower_bound" => "18", "upper_bound" => "29"],
    ["age_group_number" => "8", "lower_bound" => "12", "upper_bound" => "17"],
    ["age_group_number" => "9", "lower_bound" => "5", "upper_bound" => "11"],
    ["age_group_number" => "10", "lower_bound" => "0", "upper_bound" => "4"]
];

$ageGroups=getListAgeGroup();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Age Group Edit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<h3>Age Group Edit</h3>
<form class="inForm" action="age_group_edit.php"  method="post">
    <table>
        <tr>
            <th>Age Group Number</th>
            <th>Lower Bound</th>
            <th>Upper Bound</th>
        </tr>
    
<?php
foreach($ageGroups as $age)
{
?>
        <tr>
            <td><?php print($age["age_group_number"]); ?> </td>
            <td><input class="inForm" name="lower_bound<?php print($age["age_group_number"]); ?>" type="number" value="<?php print($age["lower_bound"]); ?>"></td>
            <td><input class="inForm" name="upper_bound<?php print($age["age_group_number"]); ?>" type="number" value="<?php print($age["upper_bound"]); ?>"></td>
        </tr>
<?php
}
?>
    
    </table>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>








