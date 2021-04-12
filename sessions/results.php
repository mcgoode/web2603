<?php
session_start();

$formData = $_POST;
$isValid = isValid($formData);

// if form is valid
if( $isValid === true ){

    // show results
    echo "<p>Success ".$formData['first-name']."!</p>";

} else {
    // form is not valid
    $_SESSION['form-data'] = $formData;
    $_SESSION['form-errors'] = $isValid;

    header('Location: form.php');
    exit();
}
/**
 * Returns true if valid else array containing what inputs failed validation
 *
 * @param $formData
 * @return bool|array
 */
function isValid($formData)
{
    $isValid = true;

    if( strlen($formData['first-name']) <= 4 && strlen($formData['first-name']) >= 20 ){
        $isValid = ['first-name' => 'First name length is not valid, must be between 4 and 20 characters long'];
    }

    return $isValid;
}