<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <title>Client index</title>
    </head>
    <body>
        <h1>All Clients</h1>
        <p>This is the list of clients.</p>
        <table>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Notes</th>
                <th>Phone</th>
            </tr>
        <?php
            foreach($data as $client) {
                echo "<tr><td>$client->first_name</td><td>$client->last_name</td><td>$client->notes</td><td>$client->phone</td>
                <td>
                    <a href = '/Client/update/$client->client_id'>update</a>
                    <a href = '/Client/delete/$client->client_id'>delete</a>
                    <a href = '/Client/details/$client->client_id'>details</a>
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