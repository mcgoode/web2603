<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>If Else Examples</title>
</head>
<body>
<h4>Inline If: </h4>
<?php

/*
 * inline if
 *
 * if ( condition ) true
 *
*/
if( date('F') == 'August' ) echo '<p>If month is August this gets printed!</p>';
?>


<h4>Inline If Else: </h4>
<?php
/*
 * inline if else
 *
 * if ( condition ) true
 * else false
 *
*/
if( date('F') != 'August' ) echo '<p>If month is not August</p>';
else echo '<p>Else month is August.</p>';
?>


<h4>Standard If Else: </h4>
<?php
/*
 * standard if else with {}
 *
 * if ( condition ){
 *      true
 * } else  {
 *      false
 * }
 *
*/
if( date('F') != 'August' ){
    echo '<p>If month is not August</p>';

} else{

    echo '<p>Else month is August.</p>';
}
?>

<h4>If Else / Else if: </h4>
<?php
/*
 * standard if else with {}
 *
 * if ( condition ){
 *      true
 * } else  {
 *      false
 * }
 *
*/
if( date('F') == 'August' ){
    echo '<p>If, month is August</p>';

} else if( date('F') == 'July' ){
    echo '<p>Else if, month is July.</p>';

} else {
    echo '<p>Else, month is not August or July.</p>';
}
?>


<h4>Ternary If Else: </h4>
<?php
// ok now a bit fancier with ternary, ( condition )? true : false
echo ( date('F') == 'August')? '<p>If month is August</p>' : '<p>If month is not August</p>';
?>

</body>
</html>




