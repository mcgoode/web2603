<?php

$arrayOfInputs = ['first','last','phone', 'address'];

class classExample
{
    public $array;

    private $inputStart = '<input ';

    private $inputEnd = '/>';

    public function getArray()
    {
        return $this->array;
    }

    public function setArray($array): void
    {
        $this->array = $array;
    }

    public function getInputStart(): string
    {
        return $this->inputStart;
    }

    public function getInputEnd(): string
    {
        return $this->inputEnd;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>WEB2603 - Class and Object Example</title>
</head>
<body>
<h1>Class and Object Example</h1>

<div>
    <form>
        <?php
        $inputClass = new classExample();

        $inputClass->setArray($arrayOfInputs);

        foreach ($inputClass->getArray() as $item){
            echo "<div style='display: block'>";
            echo "<label for='$item'>$item</label>";
            echo $inputClass->getInputStart()."name='$item' id='$item'".$inputClass->getInputEnd();
            echo "</div>";
        }
        ?>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
