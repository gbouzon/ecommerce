<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <title>Animal index</title>
    </head>
    <body>
        //TODO: add the client to the view for context
        <h1>All Animals</h1>
        <p>This is the list of animals.</p>
        <table>
            <tr>
                <th>Animal Name:</th>
                <th>Date of birth:</th>
                <th>Actions</th>
            </tr>
        <?php
            foreach($data['animals'] as $animal) {
                echo "<tr><td>$animal->name</td><td>$animal->dob</td>
                <td>
                    <a href = '/Animal/update/$animal->animal_id'>update</a>
                    <a href = '/Animal/delete/$animal->animal_id'>delete</a>
                    <a href = '/Animal/details/$animal->animal_id'>details</a>
                </td>
                
                <tr>";
            }
        ?>
        </table>
        <?php
            $this->view ('shared/navigation');
        ?>
    </body>
</html>