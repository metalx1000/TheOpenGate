<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cook Book</title>
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
    function get_json(pid){
        var url="get_json.php?pid=" + pid;
        $.getJSON( url, function( data ) {
//            data.replace(/&quot;/g,'"');
            $(".text").each(function(e){
                var id=$(this).attr("id");
                var input=$(this);
                jQuery.each(data[0], function(i, val) {
                    val=val.replace(/&quot;/g,'"');
                    if(i == id){
                        input.html(val);
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
            $.post( "update.php", $( "#form1" ).serialize() );
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
  <div class="container">
    <div id="recipe_create">
  <!--    <h2>Recipe Form</h2>-->
      <br><br><br>
        <div class="form-group">
          <input type="hidden" id="pid" value="098" name="pid">
        </div>
        <div class="form-group">
          <h1 type="text" class="text" id="title" name="title" placeholder="Enter Title"></h1>
          <hr>
        </div>
        <div class="form-group">
          <label for="prep_time">Prep Time:</label>
          <p class="text" id="prep_time" name="prep_time" placeholder="Enter Prep Time"></p>
        </div>
        <div class="form-group">
          <label for="cook_time">Cook Time:</label>
          <p class="text" id="cook_time" name="cook_time"  placeholder="Enter Cook Time"></p>
        </div>
        <div class="form-group">
          <label for="total_time">Total Time:</label>
          <p class="text" id="total_time" name="total_time" placeholder="Enter Total Time"></p>
        </div>
        <div class="form-group">
          <label for="yield">Yield:</label>
          <p class="text" id="yield" name="yield" placeholder="Enter Yield Amount"></p>
        </div>

        <div class="form-group">
          <label for="description">Description:</label>
          <p class="text" id="description" name="description" rows="10"></p>
        </div>
        <div class="form-group">
          <label for="ingredients">Ingredients:</label>
          <p class="text" id="ingredients" name="ingredients" rows="10"></p>
        </div>
        <div class="form-group">
          <label for="instructions">Instructions:</label>
          <p class="text" id="instructions" name="instructions" rows="10"></p>
        </div>

        <div class="form-group">
          <label for="comments">Comments:</label>
          <p class="text" id="comments" name="comments" rows="10"></p>
        </div>

        <div class="form-group">
          <label for="category">Category:</label>
          <p class="text" id="category" name="category"></p>
        </div>

        <div class="form-group">
          <label for="source">Source:</label>
          <p class="text" id="source" name="source" placeholder="Enter who or where you got this recipe from"></p>
        </div>

        <div class="form-group">
          <label for="tags">Tags:</label>
          <p class="text" id="tags" name="tags" placeholder="Enter Some Keywords"></p>
        </div>


    </div>
  </div>

    <div class="alert alert-info" id="alert" style="display: none">
        <a href="#" >×</a>
        <strong>Message:</strong> 
        Entry Has been submitted!
    </div>

  <div id="footer">
    <pre>
      Cook Book Software By &#169;Kris Occhipinti. 
      Licensed under GNU AFFERO GPLv3 http://www.gnu.org/licenses/agpl-3.0.txt
    </pre>
  </div>
</body>
