<script>
  function call(error,message,color){
  /*var error = "<?php  echo $error ?>";
  var message = "<?php  echo $message ?>";
  var color = "<?php  echo $color ?>";
  */
  var style = "background-color:" + color + "; 
  color: white; padding: 10px; border-radius: 5px; 
  text-align: center; position: fixed; top: 50%; 
  left: 50%; transform: translate(-50%, -50%); z-index: 9999;"
  
  var popup = document.createElement("div");
  popup.setAttribute("style", style);
  popup.innerHTML = message;
  
  document.body.appendChild(popup);
  
  // Hide the popup after 3 seconds
  setTimeout(function() {
    document.body.removeChild(popup);
  }, 3000);
}
</script>