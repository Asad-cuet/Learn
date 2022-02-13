<?php

$name="asad";
$text="wefqwf";

$old_json_data=file_get_contents('json/data.json');
$array_data=json_decode($old_json_data,true);
print_r($array_data);
$num=count($array_data);
$new_data=array(
      'id'=> 1,
      'name'=> $name,
      'text'=> $text
                  );


$array_data[]=$new_data;
$new_json_data=json_encode($array_data,JSON_PRETTY_PRINT);

//file_put_contents($old_json_data,$new_json_data)
            


/*
$new_data=array(
      'id'=> 1,
      'name'=> $name,
      'text'=> $text
                  );
print_r($array_data[]=$new_data);
echo count($array_data);

$new_json_data=json_encode($array_data,JSON_PRETTY_PRINT);

*/

?>