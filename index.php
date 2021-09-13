<?php 
session_start();
$conn = new mysqli("localhost","root","","crudnova");
if(isset($_POST['login'])) { 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tipUser = $_POST['functia'];

    $sql = "SELECT * FROM users WHERE username = ? AND parola = ? and functia = ?"; 

    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("sss",$username,$password,$tipUser); 
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    session_regenerate_id();
    $_SESSION['username'] = $row['username']; 
    $_SESSION['role'] = $row['functia'];
    session_write_close();

    if($result->num_rows == 1) {
        header("location:admin.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mainstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script href="script.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"/></script>
    <title>Clienti NOVA</title>
</head>
<body>
        <div class="container-secundar">
            <img src="img/logo.png" class="logo"/><br/>
            <!--<a id="" class="btn btn-danger mb-1" href="veziee.php">Vezi clientii Energie Electrica</a>
            <a id="" class="btn btn-danger mb-1" href="vezign.php">Vezi clienti Gaze Naturale</a>-->
        </div>


        <br />
        <div class="container w-25 p-3">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="p-5">
                <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Nume utilizator" required>
                    <br />
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Parola" required>
                </div>
                <div class="form-group lead">
                    <label class="badge badge-danger" for="functia">Functia: </label>
                    <input class="form-check-input" type="radio" name="functia" value="admin" class="custom-radio" required><span class="badge badge-danger">Admin</span>
                    <input class="form-check-input" type="radio" name="functia" value="agent" class="custom-radio" required><span class="badge badge-danger">Agent</span>
                    <input class="form-check-input" type="radio" name="functia" value="suport" class="custom-radio" required><span class="badge badge-danger">Suport</span>
                </div>

                <div class="container w-25 p-3">
                    <div class="form-group">
                        <input type="submit" name="login" class="btn btn-danger btn-outline-warning btn-block btn-lg" value="Login">
                    </div>
                </div>
            </form>
        </div>
</body>
</html>