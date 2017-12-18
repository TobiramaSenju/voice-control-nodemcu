<link rel="stylesheet" type="text/css" href="stylesheet.css">
<div class="login">
    <form id="labnol" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    	<input type="text" name="translation" id="transcript" placeholder="For text input click there." />
      <img onclick="startDictation();" src="decibel.png" alt="For voice input click here!">
         <input type="submit" name="submit" value="Send text input.">
         <center><a href="translations.txt"><font color="white">Actual string in .txt file</font></a></center>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    function startDictation() {

        if (window.hasOwnProperty('webkitSpeechRecognition')) {

            var recognition = new webkitSpeechRecognition();
            var result = '';

            recognition.continuous = false;
            recognition.interimResults = false;

            recognition.lang = "en-US";
            recognition.start();

            recognition.onresult = function(e) {
                result = e.results[0][0].transcript;

                $.post(
                    "ajax.php",
                    { translation: result }
                );

                recognition.stop();
            };

            recognition.onerror = function(e) {
                recognition.stop();
            }

        }
    }
</script>
<?php if(isset($_POST['submit'])){   
       $translation = $_POST['translation'];
    $translation = htmlspecialchars($translation);
     $translation = trim( $translation );
     if($translation == ""){
    echo "I cannot write empty field!";
  }elseif(strlen($translation) > 50){
    echo "Your string is too long!";
  }else{
   

    
           if ($translation=="turn on light"){
     
      file_put_contents("translations.txt", 'Turn on light');
     }else if($translation=="turn off light"){
           file_put_contents("translations.txt", 'Turn off light');
     }
     }
     }
?>
