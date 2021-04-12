<?php
session_start();

$formData = null;
$formErrors = null;

if( $_SESSION['form-data'] )
    $formData = $_SESSION['form-data'];

if( $_SESSION['form-errors'] )
    $formErrors = $_SESSION['form-errors'];

?>

<html lang="en">
<head>
    <title>From</title>
</head>


<body>
<form method="post" action="results.php">

    <pre><?= print_r($_SESSION, true) ?></pre>

    <div class="form-row">
        <label for="first-name">First Name:</label>
        <input type="text" value="<?= (isset($formErrors['first-name']))?  $formData['first-name'] : '' ?>" id="first-name" name="first-name" >
        <?php if( isset($formErrors['first-name']) ): ?>
            <p style="color: red; font-weight: bold"><?= $formErrors['first-name'] ?></p>
        <?php endif; ?>
    </div>

    <div class="form-row">
        <label for="last-name-name">Last Name:</label>
        <input type="text" value="<?= (isset($formErrors['last-name']))?  $formData['last-name'] : '' ?>" id="last-name" name="last-name" >
        <?php if( isset($formErrors['last-name']) ): ?>
            <p style="color: red; font-weight: bold"><?= $formErrors['last-name'] ?></p>
        <?php endif; ?>
    </div>

    <div class="form-row">
        <button type="submit">Submit</button>
    </div>

</form>

</body>
</html>
