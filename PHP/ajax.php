<?php 
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
     
?>
