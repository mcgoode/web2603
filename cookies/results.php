<?php

$formData = $_POST;
$isValid = isValid($formData);

// if form is valid
if( $isValid === true ){

    // show results
    echo "<p>Success!</p>";

} else {
    // form is not valid
    setcookie('form-data',serialize($formData));
    setcookie('form-errors',serialize($isValid));

    header('Location: form.php');
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

    if( strlen($formData['first-name']) <= 4 || strlen($formData['first-name']) >= 20 ){
        var_dump('error');
        $isValid = ['first-name' => 'First name length is not valid, must be between 4 and 20 characters long'];
    }

    return $isValid;
}