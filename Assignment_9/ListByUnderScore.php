<html>
    <body>
        <p>
        <?php
        if(isset($_SERVER["QUERY_STRING"])){
            $outText = explode("_",$_SERVER["QUERY_STRING"]);
            echo "<ul>";
            for($i = 0; $i<count($outText);$i++){
                if($outText[$i]!=""){echo "<li>{$outText[$i]}</li>";}
            }
            echo"</ul>";
        }
        else{
            echo "task failed";
        }
        ?>
        </p>

    </body>

</html>