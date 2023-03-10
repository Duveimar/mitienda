<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MI tienda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container my-5">
        <h2>Listado de clientes</h2>
        <a class="btn btn-primary" href="/mitienda/create.php" role="button">Nuevo cliente</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>    
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername ="localhost";
                $username ="root";
                $password ="";
                $database ="mitienda";

                // conexion 
                $connection = new mysqli($servername,$username,$password,$database);

                //verificando
                if($connection->connect_error){
                    die("Conection failed:" . $connection->connect_error);
                }
                //from row
                $sql ="SELECT * FROM clients";
                $result =$connection->query($sql);

                if (!$result){
                    die("Invalid query:" . $connection->error);
                }

                while($row = $result->fetch_assoc()){
                    echo"
                <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/mitienda/edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/mitienda/delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                    ";
                }  

                ?>
                
            </tbody>
        </table>

    </div>
</body>
</html>