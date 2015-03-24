<!DOCTYPE html>
<html lang="en">
<head>
  <title>Visitors</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <style>
    #alert {
      top: 50px;
      position: fixed;
      width: 100%;
    }
    .resident{
      border: 2px solid #a1a1a1;
      padding: 10px 40px; 
      background: #dddddd;
      border-radius: 25px;
      /*height: 20px;
      margin: 10px;
      padding: 20px;*/
      padding: 1em;
      margin-bottom: 0.25em;
      width: 100%;
    }
    body{
      /*width:80%;*/
      margin-left: auto;
      margin-right: auto;
      padding: 1em;
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
          var id=data[0].id;
          $("#resident").append($("<div>")
            .text(data[0].lname + ", " + data[0].fname)
            .addClass('resident')
            .attr("id", data[0].pid)
          )
          
          $("#" + data[0].pid).append($("<div>")
              .text("Phone: " + data[0].phone1) 
              .addClass('phone')
          )

          $("#" + data[0].pid).append($("<div>")
              .text("Phone: " + data[0].phone2) 
              .addClass('phone')
          )

        });
    }

    $(document).ready(function(){

        $("#license").focus();

        var d = new Date();
        $("#timedate").val(d);
        $("#pid").val(generateKey());

        if(getUrlParameter('pid')){
            $("#res_pid").val(getUrlParameter('pid'));
            get_json(getUrlParameter('pid'));
        }else{
        }
        $("#form1").submit(function(event){
            event.preventDefault();
            var d = new Date();
            $("#timedate").val(d);
            $("#alert").slideDown( "slow" ).delay( 3000 ).slideUp("slow");
            $.post( "update_visitors.php", $( "#form1" ).serialize() );
            $.post("backup_visitors.php");
            setTimeout(function(){ window.location.replace("index.php") }, 3500);
        });
        $("#alert").click(function(){
            $(this).slideUp("slow");
        });

        $("#resident").on('click','.resident',function(){
          var pid = $("#res_pid").val();
          window.location.href = "edit_residents.php?pid=" + pid;
        });

        $("#home").click(function(){
         window.location.href = "index.php"; 
        });
       
        $("#license").change(function(){
          var data=$("#license").val();
          $("#license2").val(data);
          data=data.split("^");
          var name = data[1].split("$");;
          var lname = name[0];
          var fname = name[1];
          var city = data[0];
          var address = data[2] + " " + city;
          $("#lname").val(lname);
          $("#fname").val(fname);
          $("#address").val(address);
          $("#license").val("");
        });
    });
    
  </script>

</head>
<body>
  <?php include("nav.php");?>
  <div class="container">
    <div id="visitors_create">
  <!--    <h2>Recipe Form</h2>-->
      <br><br><br>

      <div id="resident"></div>

      <div class="form-group">
        <label for="license">Swipe License:</label>
        <input type="text" class="form-control" id="license" name="license" placeholder="Swipe License">
      </div>

      <form role="form" id="form1">
        <div class="form-group">
          <input type="hidden" id="pid" value="098" name="pid">
        </div>
        <div class="form-group">
          <input type="hidden" id="timedate" value="098" name="timedate">
        </div>
        <div class="form-group">
          <input type="hidden" id="res_pid" value="098" name="res_pid">
        </div>

        <div class="form-group">
          <input type="hidden" id="license2" name="license">
        </div>

        <div class="form-group">
          <label for="fname">First Name:</label>
          <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
        </div>
        <div class="form-group">
          <label for="lname">Last Name:</label>
          <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" class="form-control" id="address" name="address"  placeholder="Address">
        </div>
<!--
        <div class="form-group">
          <label for="phone1">Phone #1:</label>
          <input type="text" class="form-control" id="phone1" name="phone1" placeholder="Phone #1">
        </div>
-->
        <div class="form-group">
          <label for="tags">Tags:</label>
          <input type="text" class="form-control" id="tags" name="tags" placeholder="Tags">
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
