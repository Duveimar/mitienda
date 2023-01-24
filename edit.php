<?php



$id="";
$name="";
$email="";
$phone="";
$address="";

$errorMessage ="";
$successMessage="";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    if(!isset($_GET["id"])){
        header("location: /mitienda/index.php");
        exit;
    }

    $id = $_GET["id"];


    $sql ="SELECT * FROM clients WHERE id=$id";
    $result = $connection->query($sql);
    $row =$result->fetch_assoc();

    if(!$row){
        header ("location: /mitienda/index.php");
        exit;
    }
    $name = $row["name"];
    $email = $rowT["email"];
    $phone = $row["phone"];
    $address = $row["address"];

}
else {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
        if(empty($id)||empty($name)|| empty($email)|| empty($phone)|| empty($address)){
            $errorMessage ="All the fields are required";
            break;
        }
        $sql="UPDATE clients" .
        "SET name='$name',email='$email',phone'$phone',address='$address".
        "WHERE id=$id";

    } while (true);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MI tienda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Nuevo Cliente</h2>

        <?php
        if(!empty($errorMessage)){
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage)</strong>
            <button type='button' class= 'btn-close' data-bs-dismiss='alert' aria-label='Close'></botton>
            </div>  
            ";
        }

        ?>

        <form method="post">
            <imput type="hidden" value="<?php echo $id;?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name"value="<?php echo $name;?>">
                </div>     
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email"value="<?php echo $email;?>">
                </div>     
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone"value="<?php echo $phone;?>">
                </div>     
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address"value="<?php echo $address;?>">
                </div>     
            </div>

            <?php 
            if(!empty($successMessage)){
                echo"
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage)</strong>
                        <button type='button' class= 'btn-close' data-bs-dismiss='alert' aria-label='Close'></botton>
                        </div>
                
                    </div>    
                </div>
                ";
            }
            ?>


            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</butoon>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/mitienda/index.php" role="button">Cancel</a>
                </div> 
            </div>                 

        </form>
        
    </div>
</body>
</html>