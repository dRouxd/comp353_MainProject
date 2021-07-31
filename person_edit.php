<?php include 'mysql_queries.php'; ?>
<?php
$person_id = $_GET["person"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    header("Location: person_details.php?person=" . $person_id);
    die();
}

# TODO: Get person data from mysql
$person = 
[
    "person_id" => 2,
    "ssn" => "666999888",
    "fname" => "Johnny",
    "lname" => "Smithy",
    "date_of_birth" => "1980-07-31",
    "age" => 41,
    "medicare_card_number" => "SMIY 8007 3132",
    "telephone" => "987-765-6543",
    "email" => "johnny.smithy@gmail.com",
    "address" => "123 mapple street",
    "city" => "Montreal",
    "province" => "QC",
    "postal_code" => "1q2w3e",
    "citizenship" => "Canadian"
];

# TODO: Get Vaccines received from mysql
$vaccines = 
[
["vaccination_id" => "1", "dose_number" => 1, "vaccination_date" => "2021-02-01", "vaccine_id" => "1", "brand" => "moderna"],
["vaccination_id" => "2", "dose_number" => 2, "vaccination_date" => "2021-03-01", "vaccine_id" => "1", "brand" => "moderna"] 
];

# TODO: Get infections from mysql
$infections = 
[
["infection_id" => "1", "type" => "delta", "date_of_infection" => "2021-01-01"],
["infection_id" => "2", "type" => "omega", "date_of_infection" => "2021-01-02"]
];

# TODO: Get provinces from Mysql
$provinces = [
    "AB",
    "BC",
    "MB",
    "NB",
    "NL",
    "NS",
    "NT",
    "NU",
    "ON",
    "PE",
    "QC",
    "SK",
    "YT"
]

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Person Edit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>

<?php include 'head.php'; ?>
<h3>Details</h3>
<form class="inForm" action="/person_edit.php?person=<?php print($person_id); ?>"  method="post">
    <input type="hidden" id="person_id" name="person_id" value="<?php print($person_id); ?>">
    <p class="inForm">
        <label class="inForm" for="SSN">SSN: </label>
        <input class="inForm" name="SSN" id="SSN" type="text" value="<?php print($person["ssn"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="fname">First Name: </label>
        <input class="inForm" name="fname" id="fname" type="text" value="<?php print($person["fname"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="lname">Last Name: </label>
        <input class="inForm" name="lname"  id="lname" type="text" value="<?php print($person["lname"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="date_of_birth">Date of Birth: </label>
        <input class="inForm" name="date_of_birth"  id="date_of_birth" type="date" value="<?php print($person["date_of_birth"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="medicare_card_number">Medicare Card Number: </label>
        <input class="inForm" name="medicare_card_number" id="medicare_card_number" type="text" value="<?php print($person["medicare_card_number"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="telephone">Telephone: </label>
        <input class="inForm" name="telephone"  id="telephone" type="text" value="<?php print($person["telephone"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="email">Email: </label>
        <input class="inForm" name="email"  id="email" type="text" value="<?php print($person["email"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="address">Address: </label>
        <input class="inForm" name="address"  id="address" type="text" value="<?php print($person["address"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="city">City: </label>
        <input class="inForm" name="city"  id="city" type="text" value="<?php print($person["city"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="province">Province: </label>
        
        <select class="inForm" name="province" id="province">
<?php
foreach($provinces as $p)
{
    if($p == $person["province"])
    {
?>           <option value="<?php print($p); ?>" selected="selected"><?php print($p); ?></option>
<?php   
    }else
    {
?>           <option value="<?php print($p); ?>"><?php print($p); ?></option>
<?php
    }
}
?>
        </select>
    </p>
    <p class="inForm">
        <label class="inForm" for="postal_code">Postal Code: </label>
        <input class="inForm" name="postal_code"  id="postal_code" type="text" value="<?php print($person["postal_code"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="citizenship">Citizenship: </label>
        <input class="inForm" name="citizenship"  id="citizenship" type="text" value="<?php print($person["citizenship"]); ?>">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

["vaccination_id" => "1", "dose_number" => 1, "vaccination_date" => "2021-02-01", "vaccine_id" => "1", "brand" => "moderna"]

<h3>Vaccines</h3>
<table class="default">
    <tr class="default">
        <th class="default">Dose Number</th>
        <th class="default">Vaccination Date</th>
        <th class="default">Brand</th>
    </tr>
<?php
foreach($vaccines as $vaccine)
{
?>
    <tr class="default">
        <td class="default"><?php print($vaccine["dose_number"]); ?></td>
        <td class="default"><?php print($vaccine["vaccination_date"]); ?></td>
        <td class="default"><a href="vaccine_detail.php?vaccine_id=<?php print($vaccine["vaccine_id"]); ?>"><?php print($vaccine["brand"]); ?></a></td>
        <td class="default"><a href="vaccination_edit.php?vaccination_id=<?php print($vaccine["vaccination_id"]); ?>">Edit</a></td>
    </tr>
<?php   
}
?>
</table>

<h3>Infections</h3>

<table class="default">
    <tr class="default">
        <th class="default">Type</th>
        <th class="default">Date of Infection</th>
    </tr>
<?php
foreach($infections as $infection)
{
?>
    <tr class="default">
        <td class="default"><?php print($infection["type"]); ?></td>
        <td class="default"><?php print($infection["date_of_infection"]); ?></td>
        <td class="default"><a href="infection_edit.php?infection_id=<?php print($infection["infection_id"]); ?>">Edit</a></td>
    </tr>
<?php   
}
?>
</table>
<a href="add_infection.php?person_id=<?php print($person_id); ?>">Add Infection</a>

<?php include 'tail.php'; ?>










