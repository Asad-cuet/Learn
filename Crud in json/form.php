<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8"> <!-- For Bangla Font -->
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css"> <!-- color Links -->
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
<script src="W3.JS.js"></script>  <!-- W3.Js library -->
<link rel="stylesheet" href="../W3.CSS-my.css">  <!-- W3.CSS library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  <!-- Icon Library -->
<head>
  <title>Page Title</title>
  <meta name="description" content="">   <!-- Complete it-->
  <meta name="keywords" content="">    <!-- Complete it-->
   
  <!-- Search engine related-->
  <meta name="robots" content="index, follow">
  <meta name="language" content="English">
  <meta name="revisit-after" content="1 days">

  <link rel="icon" type="image/jpg" sizes="16x16" href="Book cellar bd icon.jpg"> <!-- favicon,  Edit it -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  <!-- Jquery Library -->
   <!-- Bootstrap 4  Library -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
</style>
<script>   //jquery goes here
$(document).ready(function(){
  $("selector").event(function(){ //event=click,dbclick,mouseenter,mouseleave,hover,focus[click on],blur[click outside].
    $("selector").action(interval); //hide(),show(),toggle(),fadeIn(),fadeOut(),fadeToggle(),addClass(""),removeClass(""),css("property","value")
  });
});
</script>  
</head>
<body>





<!--  Update Modal -->
<div id="model" class="w3-modal" style="padding-top:10px;">
    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:450px;">
      <header class="w3-container w3-teal"> 
        <span onclick="model_close()" class="w3-button w3-display-topright my-red w3-large"><b>&times;</b></span>
      </header>
       

      <div class="w3-panel">
           <div class="w3-border w3-border-blue w3-round" style="max-width:400px;width:100%;margin-left:auto;margin-right:auto">
                              <div class="w3-container w3-blue">
                                    <h3> Update</h3>
                              </div>
                              <div class="w3-container">
                                    
                                        
                                  
                                  <h6>Name</h6>
                                  <input required type="text" id="up_name" name="name" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                                  
                                  
                                  

                                  <h6>Text</h6>
                                  <input required type="text" id="up_text" name="email" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
       
                                  

                                  <div class="w3-center w3-margin-top">
                                  <button onclick="update_save()" class="w3-button w3-red w3-round">Update</button>
                                  </div>
                                  <input type="hidden" id="hidden_id">
                                  <br>
                                 
                                  
                                  
                
                              </div> 

                
                
                      </div>   

           </div><br>


    </div>
  </div>








     <label>Name</label>
     <input type="text" id="name" class="form-control"><br>
     <label>Text</label>
     <input type="text" id="text" class="form-control"><br>
     <button onclick="create()" class="w3-button">Post</button><br>

 

<div id="msg" class="w3-red"></div>
<div id="records" class="w3-panel"></div>





<script>
$(document).ready(function(){  //call default
      readRecords(); 
});  

//Inserting
function create()
{
     
      var name=$('#name').val();
      var text=$('#text').val();

      var fd=new FormData();
      fd.append('name',name);
      fd.append('text',text);
      fd.append('insert',1);
  
      $.ajax({
       url:"form_pro.php", //Edit
       type:'POST',
       dataType:'script',
       data:fd,
       contentType:false,
       processData:false,
       success:function(data,status)
       {             
             readRecords();
             $('#msg').html(data);
 
              // if(data == 1) { $('#img_msg').html("Image Uploaded Successfully"); }
       }
      });
       
}  



//reading data
function readRecords()  
{
      var read="raed";
      $.ajax({
            url:"form_pro.php",  //Edit
            type:'POST',
            data:{ read:read },
            success:function(data,status)
            {
                $('#records').html(data);
                
            }
      });
}


//Closing MOdel
function model_close()
{
      document.getElementById('model').style.display='none';
}

//Reading for update
function update(id) 
{
      document.getElementById('model').style.display='block';
      $('#hidden_id').val(id); //Giving to input
      $.post("form_pro.php",{ update_id:id },function(data,status){  //Edit
            var user=JSON.parse(data);   //Edit
                $('#up_name').val(user.name);
                $('#up_text').val(user.text);
      });
      
                
        
}

//Updating
function update_save()
{
      var id=$('#hidden_id').val();
      var up_name=$('#up_name').val();
      var up_text=$('#up_text').val();

      var up_fd=new FormData();
      up_fd.append('id',id);

      up_fd.append('up_name',up_name);
      up_fd.append('up_text',up_text);
      up_fd.append('update',1);

      $.ajax({
       url:"form_pro.php",
       type:'POST',
       dataType:'script',
       data:up_fd,
       contentType:false,
       processData:false,
       success:function(data,status)
       {
             readRecords();
             model_close();
             $('#msg').html(data);
       }
      });
}


//Deleting
function deleteId(id)
{
      var conf=confirm("Are You Sure??");
      if(conf==true)
      {
            $.ajax({
            url:"form_pro.php",
            type:'POST',
            data:{ DeleteId:id },
            success:function(data,status)
            {
                readRecords();
                $('#msg').html(data);
            }
                  });
      }
      
}



</script>      

</body>
</html>