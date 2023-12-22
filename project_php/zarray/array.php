<?php
$strawhat_pirates = array(
    array(
        'name' => 'Luffy',
        'height' => 155,
        'weight' => 75
    ),
    array(
        'name' => 'zoro',
        'height' => 162,
        'weight' => 65
    ),
    array(
        'name' => 'Sanji',
        'height' => 170,
        'weight' => 65
    ),
    array(
        'name' => 'Robbin',
        'height' => 172,
        'weight' => 62
    ),
    array(
        'name' => 'Nami',
        'height' => 172,
        'weight' => 62
    ),
    array(
        'name' => 'Chopper',
        'height' => 180,
        'weight' => 85
    ),
    array(
        'name' => 'Franky',
        'height' => 175,
        'weight' => 75
    ),
    array(
        'name' => 'Brook',
        'height' => 162,
        'weight' => 55
    ),
    array(
        'name' => 'Jimbe',
        'height' => 150,
        'weight' => 55
    ),
    array(
        'name' => 'Ussop',
        'height' => 160,
        'weight' => 82
    )
);

$array_height = array();
foreach ($strawhat_pirates as $array_values) {
    if(array_key_exists($array_values['height'], $array_height)){
        array_push($array_height[$array_values['height']],$array_values['name']);
    }
    else{
        $array_height[$array_values['height']] = array();
        array_push($array_height[$array_values['height']],$array_values['name']);
    }
}
print_r($array_height);
?>