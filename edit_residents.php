<!DOCTYPE html>
<html lang="en">
<head>
  <title>Residents</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <style>
    #alert {
      top: 50px;
      position: fixed;
      width: 100%;
    }
  </style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script>
    function generateKey() {
        var length = 8,
            charset = "abcdefghijklnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
            retVal = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        return retVal;
    }

    function getUrlParameter(sParam)
    {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) 
        {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam) 
            {
                return sParameterName[1];
            }
        }
    }   
    var gg;
    function get_json(pid){
        var url="search_residents_json.php?pid=" + pid;
        $.getJSON( url, function( data ) {
//            data.replace(/&quot;/g,'"');
            $(".form-control").each(function(e){
                var id=$(this).attr("id");
                var input=$(this);
                jQuery.each(data[0], function(i, val) {
                    val=val.replace(/&quot;/g,'"');
                    if(i == id){
                        input.val(val);
                        var text = val;
                    }
                });
                //console.log(data[0].+""+id);
            });
        info=data[0];
        });
    }

    $(document).ready(function(){
        if(getUrlParameter('pid')){
            $("#pid").val(getUrlParameter('pid'));
            get_json(getUrlParameter('pid'));
        }else{
            $("#pid").val(generateKey());
        }
        $("#form1").submit(function(event){
            event.preventDefault();
            $("#alert").slideDown( "slow" ).delay( 3000 ).slideUp("slow");
            $.post( "update_residents.php", $( "#form1" ).serialize() );
            $.post("backup_residents.php");
        });
        $("#alert").click(function(){
            $(this).slideUp("slow");
        });

        $("#home").click(function(){
         window.location.href = "index.php"; 
        });
        
    });
  </script>

</head>
<body>
  <?php include("nav.php");?>
  <div class="container">
    <div id="residents_create">
  <!--    <h2>Recipe Form</h2>-->
      <br><br><br>
      <form role="form" id="form1">
        <div class="form-group">
          <input type="hidden" id="pid" value="098" name="pid">
        </div>
        <div class="form-group">
          <label for="lname">Last Name:</label>
          <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
        </div>
        <div class="form-group">
          <label for="fname">First Name:</label>
          <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" class="form-control" id="address" name="address"  placeholder="Address">
        </div>
        <div class="form-group">
          <label for="phone1">Phone #1:</label>
          <input type="text" class="form-control" id="phone1" name="phone1" placeholder="Phone #1">
        </div>
        <div class="form-group">
          <label for="phone2">Phone #2:</label>
          <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Phone #2">
        </div>

        <div class="form-group">
          <label for="other_residents">Other Residents:</label>
          <textarea cols="40" class="form-control" id="other_residents" name="other_residents" rows="5"></textarea>
        </div>
        <div class="form-group">
          <label for="guests">Guests:</label>
          <textarea cols="40" class="form-control" id="guests" name="guests" rows="5"></textarea>
        </div>
        <div class="form-group">
          <label for="comments">Comments:</label>
          <textarea cols="40" class="form-control" id="comments" name="comments" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
      </form>

    </div>
  </div>

    <div class="alert alert-info" id="alert" style="display: none">
        <a href="#" >×</a>
        <strong>Message:</strong> 
        Entry Has been submitted!
    </div>
</body>
