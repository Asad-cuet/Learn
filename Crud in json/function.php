<?php
$connection=1; // mysqli_connect('localhost','root','',''); #mysqli_connect('HostName','Username','Password','DB_Name');

function filter($data)
   {
      global $connection;
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data);
      $data=escapeshellcmd($data);
      $data=mysqli_real_escape_string($connection,$data);
      return $data;
  }

function show($data)
{
   $data=htmlspecialchars($data);
   return $data;
}


function input($data) 
 {
    global $connection;
    $input=$_POST[$data];
    $input=trim($input);
    $input=stripslashes($input);
   // $input=htmlspecialchars($input);
    return mysqli_real_escape_string($connection,$input); // Inputing data
    # example: $name=input("name");   echo $name;
 }

function my_time()
 {
    return date('F j, Y, g:i a', time() - 6*3600);
    # example: echo $time=my_date();
 } 
 
function input_file($destination,$file_data)
 {
   $file=$_FILES[$file_data];
   $name=uniqid().$file["name"];
   $tmp_name=$file["tmp_name"];
   $destin=$destination;
   move_uploaded_file($tmp_name,$destin.$name);  # move_upload_file(file tmp_name,destination);
   return $name;
  #examp: $file_name=input_file("destin/","carry-name");

 }

function delete_file($destination,$name)
 {
   $destin=$destination;
   unlink("$destin.$name");
   #examp: delete_file("destin/","file-name")
 }

function checkbox($data)
{
 $check_data=$_REQUEST[$data]; //Process
 return implode(",",$check_data);
 #examp: $value=checkbox("array-name");
}

function select_a_data($table,$column,$primary_column,$primary_value)
{
global $connection;
$select_query="SELECT $column FROM $table WHERE $primary_column=$primary_value";  
$result=mysqli_query($connection,$select_query);
while($row=mysqli_fetch_row($result)) 
{
   return $row[0];  
}
# examp: echo $result=select_a_data("book_info","Book_title","Book_id",27);
}


function verify($user_data,$pass_data,$location)
{
global $connection;
$username=$_POST[$user_data];
$password=$_POST[$pass_data];
$username=trim($username);
$$password=trim($password);
$username=stripslashes($username);
$$password=stripslashes($password);
$username=htmlspecialchars($username);
$password=htmlspecialchars($password);
$username=mysqli_real_escape_string($connection,$username); // Inputing data
$password=mysqli_real_escape_string($connection,$password); // Inputing data
$verify_query="SELECT * FROM user WHERE Username='$username' AND Password='$password'";
$verify=mysqli_query($connection,$verify_query);
$row=mysqli_num_rows($verify);
if($row>0)
{
     
      $_SESSION['verified']=1;
      header("location:$location");                  
    }
    else
    {
        echo"<script>alert('Invalid Username or Password');</script>";
    }
 #examp: verify("username","password","test.php");
}

function random()
{
$all_keys=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q',
                'r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I',
                'J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2',
                '3','4','5','6','8','9',':','!','@','#','$','%','^','&','*','(',')','-',
                '_','=','+','?','.');
$length=array(8,9,10,11,12,13,14,15);
shuffle($length);
$final_length=$length[0]; # you can also use= $final_length=rand(8,15);
echo "<br>Password legth is ".$final_length;
$pass="";
for($i=0; $i<$final_length; $i++) {
    shuffle($all_keys);
    $pass.=$all_keys[0];
    
}
  return $pass;
 #examp: $pass=random();
}

function verify_email($email) #Edit it when you upload it to server
{

$to_mail=$email;

$subject="Verification";
$pin=rand(100000,999999);
$body="Your verification Pin is $pin";

$header="From:mytest7733@gmail.com";
mail($to_mail,$subject,$body,$header);
return $pin;
#examp: $pin=verify_email("asadul7733@gmail.com");
}


function get($data)
{
    return $value=$_REQUEST[$data];
    #examp: $value=get("carry-name");
}


function array_session($ss_name,$value)
{
array_push($_SESSION[$ss_name],$value); // id adding in array
}

function array_to_string($key,$arr)
{
   return implode($key,$arr);  // implode differing id by ,
}


function send_mail($to,$sub,$body,$from)
{
$to_mail=$to;

$subject=$sub;

$body_=$body;

$header="From:$from";

mail($to_mail,$subject,$body_,$header);
}

?>
