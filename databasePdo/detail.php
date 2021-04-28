<?php

if( !isset($_GET['cid']) ){
    $noCidError = 'No CID given, please go back to <a href="customers.php">customer list</a>.';
}else{
    $customerId = $_GET['cid'];

    $data = getCustomerDetails($customerId);
}

function getCustomerDetails($id)
{

    if( intval($id) == 0 ) return 'Customer ID is not valid';

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

    // raw query
    $sql = "SELECT * FROM customers where customerNumber = :cid";

    // prepare query and generate statement to execute.
    $stmt = $dbConnection->prepare($sql);

    // execute query
    $stmt->execute(['cid'=>$id]);

    // get fetch mode
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // get ALL results
    return $stmt->fetch();

}


?>

<html lang="en">
<head>
    <title>Database Stuff</title>
</head>

<body>

<?php if( isset($noCidError) ): ?>
<div style="background-color: lightcoral; border: red; padding: 1em; margin: 1em; border-radius: 10px;">
    <p style="color: red"><?= $noCidError ?></p>
</div>
<?php endif ?>

<!--<pre>--><?php //var_dump($data) ?><!--</pre>-->

<?php if( isset($data)): ?>

    <?php if( is_array($data)): ?>
    <table style="width: 100%">
        <tr>
            <th>CID:</th>
            <td><?= $data['customerNumber'] ?></td>
        </tr>
        <tr>
            <th>Business Name:</th>
            <td><?= $data['customerName'] ?></td>
        </tr>
        <tr>
            <th>Last Name:</th>
            <td><?= $data['contactLastName'] ?></td>
        </tr>
        <tr>
            <th>First Name:</th>
            <td><?= $data['contactFirstName'] ?></td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td><?= $data['phone'] ?></td>
        </tr>
        <tr>
            <th>Address:</th>
            <td>
                <p><?= $data['addressLine1'] ?></p>
                <p><?= $data['addressLine2'] ?></p>
                <p><?= $data['city'] ?>,<?= $data['state'] ?> <?= $data['postalCode'] ?></p>
                <p><?= $data['country'] ?></p>
            </td>
        </tr>
        <tr>
            <th>Sales Rep:</th>
            <td><?= $data['salesRepEmployeeNumber'] ?></td>
        </tr>
        <tr>
            <th>Credit Limit:</th>
            <td><?= $data['creditLimit'] ?></td>
        </tr>
    </table>
    <?php else: ?>
        <div style="background-color: lightcoral; border: red; padding: 1em; margin: 1em; border-radius: 10px;">
            <p style="color: red"><?= $data ?></p>
        </div>
    <?php endif; ?>

<?php else: ?>
    <div style="background-color: lightblue; border: blue; padding: 1em; margin: 1em; border-radius: 10px;">
        <p style="color: cornflowerblue">No customer records found by that ID</p>
    </div>
<?php endif; ?>

<a href="customers.php">Back to Customer List</a>

</body>
</html>
