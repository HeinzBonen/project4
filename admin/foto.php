<?php
session_start()
?>



        <span><label>(optioneel)Foto product: </label><select name="pfoto" id="pfoto" onchange="fotofunctie()">
            <option value="">- selecteer -</option>
            <?php
            $fileList = glob('../fotos/*');
            foreach($fileList as $filename){
                if(is_file($filename)){
                    echo '<option>'; echo substr($filename, 9); echo'</option>'; 
                }   
            }
            ?>        
        </option>
            </select>

            <p id="demo"></p>
            <html id="bemo"></html>

            <script>
                function fotofunctie() {
                var a = document.getElementById("pfoto").value;
                document.getElementById("demo").innerHTML = "You selected: " + a;
                var b = "../fotos/" + document.getElementById("pfoto").value;
                document.getElementById("bemo").innerHTML = "<img src="+b+">";
                }
            </script>

          

            

            

          