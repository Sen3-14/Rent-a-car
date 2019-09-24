<!DOCTYPE html>
<html>
   <head>
        <title>Zaboravljena lozinka</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <style>
                input[type=text], select {
                  width: 100%;
                  padding: 12px 20px;
                  margin: 8px 0;
                  display: inline-block;
                  border: 1px solid #ccc;
                  border-radius: 4px;
                  box-sizing: border-box;
                }
                
                input[type=submit] {
                  width: 100%;
                  background-color: #4CAF50;
                  color: white;
                  padding: 14px 20px;
                  margin: 8px 0;
                  border: none;
                  border-radius: 4px;
                  cursor: pointer;
                }
                
                input[type=submit]:hover {
                  background-color: #45a049;
                }
                
                #forma {
                  border-radius: 5px;
                  background-color: #f2f2f2;
                  padding: 20px;
                }
                </style>
    
   </head>

   <body>
        <?php
             require 'header.php';
        ?>
           <center><h1>Nova lozinka</h1></center>
            <?php
                $selector = $_GET['selector'];
                $validator = $_GET['validator'];
                if(empty($selector) || empty($validator)){
                    echo "could not validate";
                } else {
                    if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
                       ?>
                            <div id="forma">
                    <form method="POST" action="fogtPass_sc.php">
                      <input type="hidden" name="selector" value="<?php echo $selector;?>">
                      <input type="hidden" name="validator" value="<?php echo $validator;?>">
                      <label for="fnam">Unesite novu lozinku</label>
                      <input type="text" name="pwd" placeholder="Nova lozinka">
                      <input type="text" name="pwd-repeat" placeholder="Ponovi lozinku">                    
                      <input type="submit" name="submit" value="Postavi novu lozinku">
                    </form>
                 </div>
                       <?php
                    }
                }
            ?>

            
        <?php
             require 'footer.php';
        ?>
   </body>
</html>