<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <title>Animal Feedback</title>
    </head>
    <body>
        <h1>Feedback for the animal data</h1>

        <p>Please enter the details of the animal you want to create.</p>

        <form method = "POST" action = "">
            <label class = "form-label">Animal name: <input class = "form-control" value = "<?= $data['name'] ?>" type = "text" name = "name"></label> <br> <br>
            <label class = "form-label">Birth date: <input class = "form-control" value = "<?= $data['dob'] ?>" type = "date" name = "dob"></label> <br> <br>
            <input class = "form-control" type = "submit" name = "action" value = "Create!">
        </form>

        <?php
            $this->view ('shared/navigation');
        ?>
    </body>
</html>