<?php
echo "<h3>Basic practice of objects and classes</h3>";
class cars
{

    public $owner = '';
    public $car = '';
    public $year = '';
    public $valid = '';

    function carData($a, $b, $c, $d)
    {
        $this->owner = $a;
        $this->car = $b;
        $this->year = $c;
        $this->valid = $d;
    }

    function display()
    {
        $d = "My name is $this->owner <br>";
        $d .= "I have $this->car <br>";
        $d .= "I bought this car in $this->year <br>";
        $d .= "I can use this until $this->valid <br>";
        return $d;
    }

}
$obj = new cars();
$obj->carData("Rahul", "Hummer", 2023, 2070);
echo "<br>";
echo $obj->display();
echo "<br>";

exit("finish");
?>