<?php include 'Command.php'; ?>

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
            url: 'Command.php',
            async: true,
            success: function() {
                alert('Load was performed.');
                $('#output').load("Command.php", {command: event.target.children[1].value});
                var temp = event.target.children[1].value.split(" ");

                if (temp.includes("repo_desc") && temp[2]){
                    $.ajax(`https://api.github.com/repos/${temp[1]}/${temp[2]}`).done(function(json) { 
                    $("#output").append(`<quote>${json.description}</quote>`);       
                    }).fail(function(){
                        $("#output").append(`<quote><strong>I am sorry to inform you that the project you are looking for does not exist...</strong></quote>`);
                    });
                }
            }
        });

    })
    
        
               
    </script>

</body>
</html>

