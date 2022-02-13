<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="stylesheet" href="../W3.CSS-my.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <title>Document</title>
</head>
<body>
      <div class="w3-panel">
          <div class="w3-bar">
                <div class="w3-bar-item w3-right w3-button w3-blue" onclick="document.getElementById('id01').style.display='block'">Insert</div>
           </div>
      <div class="w3-red" id="msg"></div>     


      <div id="records"></div>

    
      </div>









<script>
$(document).ready(function(){  //call default
      
      
      readRecords();
      $(document).on("click",".pag-click",function() //after click it always active
      {
            var page=$(this).attr("id");
            readRecords(page); 
      });
      

      
});  





//reading data
function readRecords(page)  
{
      if(page==null)
      {
            page=1;
      }

      $.ajax({
            url:"backend.php",  //Edit
            type:'POST',
            data:{ page:page },
            success:function(data,status)
            {
                $('#records').html(data);
                model_close();
            }
      });
}




</script>      


</body>
</html>