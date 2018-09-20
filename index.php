<html>
   <head>
      <title>my page</title>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
      <script type = "text/javascript" language = "javascript">
         $(document).ready(function() {
            $("#frmReg").validate();

             // $("#frmReg").valid();
             $("#frmReg").submit(function(event){
                 event.preventDefault();
                 submit = $("#driver").val();
                
                    var option= $('#selected_api').val();
                    var error = 0;
                if (!($('#checkbox_id').is(':checked'))) {
                 error = 1
                alert("Please Tick the i have the bike");
                }
                if (error) {
                 return false;
                } else {
               return true;
               }
                    if($("#frmReg").valid()){
                     //alert($("#frmReg").valid());  
                     $.ajax({
            
                     url:"http://localhost/LUDOAPI/users/"+option,
                     type : 'POST',
                    
                     data : $("form").serialize(),
                     dataType : 'json',
                     success:function(response) {
                        console.log(response);
                        console.log(response.data[0].Coach.id + response.data[0].Coach.name );
                        console.log(response.data[0].Coach.name);
                     }
                     });
                    }
                
                });   
              
         });
      </script>
   </head>
   <body>
      <form id="frmReg" id ="frmReg" name="frmReg" action="" method="post">
         <p>SELECT API:</p>
         <select name="api" id="selected_api" required/>
            <option value="" id="option0">select</option>
            <option value="upcomingbooking" id="option1">upcomingbooking</option>
            <option value="CoachProfile"id="option2">CoachProfile</option>
            </select>
         <br /><br />
         coach_id:<input type="text" id="coachdetail" name="coach_id" required/>
         <br/>
         <input type="checkbox" name="vehicle" id="checkbox_id" value="Bike"> I have a bike<br>
         <input type="submit" id="driver" value="SUBMIT">
      </form>
   </body>
</html>