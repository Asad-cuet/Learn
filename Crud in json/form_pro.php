<?php
extract($_POST);


//Inserting
if(isset($_POST['insert'])) 
{
$name=ucfirst($_POST['name']);
$text=$_POST['text'];

$old_json_data=file_get_contents('json/data.json');
$array_data=json_decode($old_json_data,true);
$num=count($array_data);
$new_data=array(
      'id'=> $num,
      'name'=> $name,
      'text'=> $text
                  );
$array_data[]=$new_data;
$new_json_data=json_encode($array_data,JSON_PRETTY_PRINT);

if(file_put_contents("json/data.json",$new_json_data))
{
echo $name." ".$text." Added to Json File";
}
else {
      echo "Falid";
}


}

//Reading table
if(isset($_POST['read']))  
{
      
      $data='<table class="w3-table-all">
      <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Text</th>
            <th>Edit</th>
            <th>Delete</th>
      </tr>';
      $old_json_data=file_get_contents('json/data.json');
      $array_data=json_decode($old_json_data,true);
      $num=count($array_data);
      


      foreach($array_data as $key => $value)
      {
      
            $data.='<tr>
            <td>'.$value['id'].'</td>
            <td>'.$value['name'].'</td>
            <td>'.$value['text'].'</td>
            <td><span onclick="update('.$value['id'].')" class="w3-button w3-green w3-small">Edit</span></td>
            <td><span onclick="deleteId('.$value['id'].')" class="w3-button w3-red w3-small">Delete</span></td>
            </tr>';
            
            
            
           
             
          
      }
       $data.='</table>';
       echo $data;
}


// Reading for update
if(isset($_POST['update_id']))
{
     $id=$_POST['update_id'];
     $old_json_data=file_get_contents('json/data.json');
     $array_data=json_decode($old_json_data,true);


     foreach($array_data as $key => $value)
     {
      if($value['id']==$id) 
          {
            $response=$array_data[$key];
           
          }
     }
      echo json_encode($response);


}


//Updating
if(isset($_POST['update']))
{
$id=htmlspecialchars($_POST['id']);  
$name=ucfirst($_POST['up_name']);
$text=ucfirst($_POST['up_text']);
$old_json_data=file_get_contents('json/data.json');
$array_data=json_decode($old_json_data,true);
foreach($array_data as $key => $value)
{
 if($value['id']==$id) 
     {
      $array_data[$key]['name']=$name;
      $array_data[$key]['text']=$text;
     }
}




$new_json_data=json_encode($array_data,JSON_PRETTY_PRINT);

file_put_contents("json/data.json",$new_json_data);
echo "Updated";
}


//Deleting
if(isset($_POST['DeleteId']))
{
$id=htmlspecialchars($_POST['DeleteId']);
$old_json_data=file_get_contents('json/data.json');
$array_data=json_decode($old_json_data,true);
foreach($array_data as $key => $value)
{
 if($value['id']==$id) 
     {
      unset($array_data[$key]);
      $array_data=array_values($array_data);  // //rearranging keys

     }
}

$new_json_data=json_encode($array_data,JSON_PRETTY_PRINT);

file_put_contents("json/data.json",$new_json_data);
echo "Deleted";  
}
?>