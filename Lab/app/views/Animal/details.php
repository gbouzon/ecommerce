<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <title>Animal Details</title>
    </head>
    <body>
        <h1>Animal Details</h1>

        <p>Details:</p>

        <form method = "POST" action = "">
            <label class = "form-label">Animal name: <input disabled class = "form-control" type = "text" name = "name" value = '<?=$data->name ?>'</label> <br> <br>
            <label class = "form-label">Birth date: <input disabled class = "form-control" type = "text" name = "dob" value = '<?=$data->dob ?>'></label> <br> <br>
        </form>
        <?php
            $this->view ('shared/navigation');
        ?>
    </body>
</html>