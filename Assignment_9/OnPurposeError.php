<html>
    <body>
        <p>
        <?php
        $name = $_GET['name']
        if(isset($name)){
            echo "Hello {$name}"
        }
        else{
            echo "Hello, John Doe. I say this because I don't know your name!"
        }
        ?>
        </p>

    </body>

</html>