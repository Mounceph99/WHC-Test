<?php 
    set_include_path("commands");
    require 'AbstractCommand.php';
    require 'AddCommand.php';
    require 'SortAscCommand.php'; 
    require 'RepoDescCommand.php';  
    ?>

<!DOCTYPE html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>

    <h2>Mounceph Morssaoui</h2>
    <form method="get">
        <label>Enter command</label>
        <input type = "text" name = "command"/>
        <input type = "submit">
    </form>
    <p id = "output">
    
    </p>
       

    <script>
    $('form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url: 'commands/AbstractCommand.php',
            async: true,
            success: function() {
                $('#output').load("commands/AbstractCommand.php", {command: event.target.children[1].value});
            }
        });

    })
              
    </script>

</body>
</html>

