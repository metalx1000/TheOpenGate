<html>
<head>
  <title>Resident Search</title>
  <link rel="icon" type="image/png" href="fav.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <style>
    #alert {
      top: 0px;
      position: fixed;
      width: 100%;
    }
    .name{
      font-weight: bold;
      font-size: 100%;
    }
    .visitors{
      background-color: #99CCFF;
      /*height: 20px;
      margin: 10px;
      padding: 20px;*/
      color: #fff;
      padding: 1em;
      margin-bottom: 0.25em;
    }
    body{
      /*width:80%;*/
      margin-left: auto;
      margin-right: auto;
      padding: 1em;
    }
    input{
      width:100%;
      margin-bottom: 10px;
      font-size: 200%;

    }
    .tags, .comments{
      margin-left: 10px;
    }
    #print{
      display: none;
    }
  </style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function(){
      var url="get_history_json.php";
      $.getJSON( url, function( data ) {
          for(var i=0;i<data.length;i++){
            $("#count").html("Currently " + data.length + " Logs in Database");
            $("#results").append($("<div>")
                .addClass('visitors')
                .attr("pid", data[i].pid)
                .attr("id", data[i].pid)
            );

            //NAME
            var fname=data[i].fname.toUpperCase()
            var lname=data[i].lname.toUpperCase()
            $("#" + data[i].pid).append($("<div>")
                .text(lname + ", " + fname)
                .addClass('name')
            )

            //timedate
            var timedate=data[i].timedate.toUpperCase();
            timedate = timedate.replace(/(?:\r\n|\r|\n)/g, ', ');
            $("#" + data[i].pid).append($("<div>")
              .text(timedate) 
              .addClass('timedate')
            )

            //address
            var address=data[i].address.toUpperCase();
            address = address.replace(/(?:\r\n|\r|\n)/g, ', ');
            $("#" + data[i].pid).append($("<span>")
              .text(address) 
              .addClass('address')
            )

            //tags
            var tags=data[i].tags.toUpperCase();
            tags = tags.replace(/(?:\r\n|\r|\n)/g, ', ');
            $("#" + data[i].pid).append($("<span>")
              .text("Tags: " + tags) 
              .addClass('tags')
            )

            //Comments
            $("#" + data[i].pid).append($("<div>")
              .text(data[i].comments.toUpperCase()) 
            )

          }
      });

      $("#search").keyup(function(){
        var v=$(this).val().toUpperCase();
        $(".resident").hide();
        $( ".name:contains('"+v+"')" ).parent().show();
        $( ".other:contains('"+v+"')" ).parent().show();
      });
  
      $("#results").on('click','.resident',function(){
        var pid = $(this).attr("pid");
        window.location.href = "edit_visitors.php?pid=" + pid;
      });

      $("#new").click(function(){
        window.location.href = "edit_residents.php";
      });

    });
  </script>
</head>
<body>

      <?php include("nav.php");?>
  <br><br><br>
  <div id="main" class="container">
    <div id="header">
    </div>
    <label id="count"></label>
    <input id="search" type="text" placeholder="Enter Search"/>
    <div id="results"></div>
  </div>
</body>
</html>
