<html>

    <head>

    <script>
    </script>

    </head>
    <div id = "container"></div>

    <body>
        <p>
        <?php
        if(isset($_GET['name'])){
            echo "Hello {$_GET['name']}";
        }
        else{
            echo "Hello, John Doe. I say this because I don't know your name!";
        }
        ?>
        </p>

    </body>

</html>