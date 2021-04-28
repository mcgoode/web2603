<?php
session_start();

$servername = "web2603.chrisgoode.me";
$username = "web2603_student";
$password = "?DhHCq#9TR";

try {
    $dbConnection = new PDO("mysql:host=$servername;dbname=web2603", $username, $password);
    // set the PDO error mode to exception
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


// set default sort
$sortColumnName = 'contactLastName';

// check if a desired sort was clicked
if( isset($_GET['sort']) ){
    $desiredSort = $_GET['sort'];

    switch ($desiredSort){
        case ($desiredSort == 'id'):
            $sortColumnName = 'customerNumber';
            break;
        case ($desiredSort == 'first'):
            $sortColumnName = 'contactFirstName';
            break;
        case ($desiredSort == 'last'):
            $sortColumnName = 'contactLastName';
            break;
        case ($desiredSort == 'phone'):
            $sortColumnName = 'phone';
            break;
        case ($desiredSort == 'credit'):
            $sortColumnName = 'creditLimit';
            break;
    }
}

// raw query
$sql = "SELECT customerNumber, contactFirstName, contactLastName, phone, creditLimit FROM customers ORDER BY $sortColumnName";

// prepare query and generate statement to execute.
$stmt = $dbConnection->prepare($sql);

// execute query
$stmt->execute();

// set fetch mode
$stmt->setFetchMode(PDO::FETCH_ASSOC);

// get ALL results
$customers = $stmt->fetchAll();

?>

<html lang="en">
<head>
    <title>Database Stuff</title>
</head>

<body>
<table style="width: 100%;">
    <thead>
    <tr>
        <th>CID <a href="customers.php?sort=id">sort</a></th>
        <th>First Name <a href="customers.php?sort=first">sort</a></th>
        <th>Last Name <a href="customers.php?sort=last">sort</a></th>
        <th>Phone <a href="customers.php?sort=phone">sort</a></th>
        <th>Credit Limit <a href="customers.php?sort=credit">sort</a></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($customers as $customer): ?>
        <tr>
            <td><a href="detail.php?cid=<?= $customer['customerNumber'] ?>"><?= $customer['customerNumber'] ?></a></td>
            <td><?= $customer['contactFirstName'] ?></td>
            <td><?= $customer['contactLastName'] ?></td>
            <td><?= $customer['phone'] ?></td>
            <td><?= $customer['creditLimit'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


</body>
</html>
