<?php
session_start();

// create connection to database
$dbConnection = new mysqli("","","","");

// Check connection
if ($dbConnection -> connect_errno) {
    echo "Failed to connect to MySQL: " . $dbConnection->connect_error;
    exit();
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

// get result set
$results = $stmt->get_result();

// get ALL results
$customers = $results->fetch_all(MYSQLI_ASSOC);

// close connection
$dbConnection->close();

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
