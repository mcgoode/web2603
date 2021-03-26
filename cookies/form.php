<?php

$formData = null;
$formErrors = null;


if( $_COOKIE['form-data'] )
    $formData = unserialize($_COOKIE['form-data']);

if( $_COOKIE['form-errors'] )
    $formErrors = unserialize($_COOKIE['form-errors']);

// reset errors
setcookie('form-errors','')
?>

<html lang="en">
<head>
    <title>From</title>
</head>


<body>
<form method="post" action="results.php">

    <div class="form-row">
        <label for="first-name">First Name:</label>
        <input type="text" value="<?= (isset($formErrors['first-name']))?  $formData['first-name'] : '' ?>" id="first-name" name="first-name" >
        <?php if( isset($formErrors['first-name']) ): ?>
            <p style="color: red; font-weight: bold"><?= $formErrors['first-name'] ?></p>
        <?php endif; ?>
    </div>

    <div class="form-row">
        <button type="submit">Submit</button>
    </div>

</form>

</body>
</html>
