<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
          $(document).ready(function(){
  var passOne = $("#passOne").val();
  var passTwo = $("#passTwo").val();
  
  $("#footerText").html("minimum length 8");
  
  var checkAndChange = function()
  {
    if(passOne.length < 1){
      if($("#footer").hasClass("correct")){
        $("#footer").removeClass("correct").addClass("incorrect");
        $("#footerText").html("They don't match");
      }else{
        $("#footerText").html("They don't match");
      }
    }
    else if($("#footer").hasClass("incorrect"))
    {
      if(passOne == passTwo){
        $("#footer").removeClass("incorrect").addClass("correct");
        $("#footerText").html("Continue");
      }
    }
    else
    {
      if(passOne != passTwo){
        $("#footer").removeClass("correct").addClass("incorrect");
        $("#footerText").html("They don't match");
      } 
    }   
  }
  
  
  
  $("input").keyup(function(){
    var newPassOne = $("#passOne").val();
    var newPassTwo = $("#passTwo").val();
    
    passOne = newPassOne;
    passTwo = newPassTwo;
    if(passOne.length>=8){
        $("#footerText").html("They don't match");
        checkAndChange();
    }
    
   
  });
  $("#footerText").click(function(){
    var passOne = $("#passOne").val();
  var passTwo = $("#passTwo").val();
  if(passOne.length<=7||passTwo.length<=7){
      return false;
  }
  });
});
 </script>
        <style>
body
{
  background:url("http://myminispot.com/images/prox.png");
  background-size:cover;
}
#container
{
  position:absolute;
  background:#fff;
  height:350px;
  width:300px;
  top:50%;
  left:50%;
  margin-left:-150px;
  margin-top:-175px;
  
  box-shadow: 0px 30px 150px;
  -webkit-box-shadow: 0px 30px 150px;
  -moz-box-shadow: 0px 30px 150px;
  
  border-radius:15px;
  -webkit-border-radius:15px;
  -moz-border-radius:15px;
}
#header
{
  background-color:#F26B6B;
  font-family: 'Francois One', sans-serif;
  height:75px;
  width:300px;
  position:absolute;
  top:0;
  color:white;
  margin-top:-2px;
  
  border-radius: 15px 15px 0px 0px;
  -webkit-border-radius: 15px 15px 0px 0px;
  -moz-border-radius: 15px 15px 0px 0px;
}
#footer.incorrect
{
  background-color:#F26B6B;
  font-family: 'Francois One', sans-serif;
  height:75px;
  width:300px;
  position:absolute;
  bottom:0;
  color:white;
  margin-bottom:-2px;
  
  border-radius: 0px 0px 15px 15px;
  -webkit-border-radius: 0px 0px 15px 15px;
  -moz-border-radius: 0px 0px 15px 15px;
}
#footer.correct
{
  background-color:#84F075;
  font-family: 'Francois One', sans-serif;
  height:75px;
  width:300px;
  position:absolute;
  bottom:0;
  color:white;
  cursor:pointer;
  margin-bottom:-2px;
  
  border-radius: 0px 0px 15px 15px;
  -webkit-border-radius: 0px 0px 15px 15px;
  -moz-border-radius: 0px 0px 15px 15px;
}
#form
{
  height:100px;
  position:absolute;
  top:50%;
  margin-top:-50px;
  width:75%;
  left:50%;
  margin-left:-37.5%;
}
input
{
  width:215px;
  margin:0;
  border:0;
  border-left:1px solid;
  border-right:1px solid;
  outline:none;
  height:50px;
  font-size:20px;
  padding-left:10px;
}
input#passOne
{
  border-top:1px solid;
  border-radius:15px 15px 0px 0px;
  -webkit-border-radius:15px 15px 0px 0px;
  -moz-border-radius:15px 15px 0px 0px;
}
input#passTwo
{
  border-bottom:1px solid;
  border-top:1px solid;
  
  border-radius:0px 0px 15px 15px;
  -webkit-border-radius:0px 0px 15px 15px;
  -moz-border-radius:0px 0px 15px 15px;
}
         </style>
    </head>
<body>
    <div id="container">
       <form method="POST" action="{{route('setpassword')}}">
        @csrf
          <div id="header" style="text-align: center;">
            <h1>Change Password</h1>
          </div> 
          <div id="form">
            <input type="password" placeholder="New Password" id="passOne"/>
            <input type="password" placeholder="Confirm Password" id="passTwo" name="password"/>
            <input type="hidden" value="{{$id}}" name="id"/>
          </div>
          <button id="footer" class="incorrect" style="text-align: center;">
            <h1 id="footerText">Filler text</h1>
          </button>
       </form>
    </div>
</body>
</html>
   