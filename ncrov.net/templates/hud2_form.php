<div id="middle">
 
    <div> 
        <input id="text2" class="form-control" name="roverAddress" placeholder="ROVER_IP_ADDRESS" type="text"/>
        <button onclick="ripFunction()" class="btn btn-default">ROV IP</button>
   </div><script type="text/javascript">

var rover_address = [];
function ripFunction() {
    rover_address = $("#text2").val(); 
}
   
window.addEventListener("keydown",checkKeyPressed,false);

function checkKeyPressed(e) 
{
 // if up arrow is pressed
    if (e.keyCode == "38")
    {
       $.post("http://" + rover_address + "/arduino/digital/12/1");
    }  
    // if left arrow is pressed
    if (e.keyCode == "37")
    {
        $.post("http://" + rover_address + "/arduino/digital/7/1");     
    }
    // if right arrow is pressed
    if (e.keyCode == "39")
    {
        $.post("http://" + rover_address + "/arduino/digital/6/1");
    }
    // if down arrow is pressed
    if (e.keyCode == "40")
    {
        $.post("http://" + rover_address + "/arduino/digital/8/1");
    }
    // if space bar is pressed
    if (e.keyCode == "32")
    {
        $.post("http://" + rover_address + "/arduino/digital/12/0");
    }
    // if z is pressed
    if (e.keyCode == "88")
    {
        $.post("http://" + rover_address + "/arduino/digital/2/1");
    }
    // if x is pressed
    if (e.keyCode == "90")
    {
        $.post("http://" + rover_address + "/arduino/digital/3/1");
    }
}
</script>
        </div>
        <div text-align:"right">
         <a class= "hideDisplay">
            <img src= "/public/img/manual.png" width= "100" height="50" alt="manual">
              <span class="showDisplayOnHover">
                <span class="showBodyOfDisplay"> 
                 <p><h3>Press Up Arrow Once To Move Forward</h3></p>
                 <p><h3>Press Down Arrow Once To Move in Reverse</h3></p> 
                 <p><h3>Press Space Bar To Stop</h3></p> 
                 <p><h3>Press Left Arrow To Nudge Left</h3></p>
                 <p><h3>Press Right Arrow To Nudge Right</h3></p>  
                 <p><h3>Press z To Turn Left 30 Degrees</h3></p>
                 <p><h3>Press x To Turn Right 30 Degrees</h3></p> 
                </span>        
              </span>
            </a>     
        </div>
        <div id ="middle">
          <ul  class="nav nav-pills ">
              <li><a href="logout.php"><strong>Log Out</strong></a></li>
          </ul>
        </div>