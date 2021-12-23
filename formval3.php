<?php

    $email=$password=$gender='';
    $err_email=$err_password=$err_gender='';
    $not_password='';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["email"])){
            if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
                $email = val($_POST["email"]);
            }
            else{
                $err_email = '<div class="alert alert-danger" role="alert">Empty email fild..!</div>';
            }
        }
        if(empty($_POST["password"])){
            $err_password = '<div class="alert alert-danger" role="alert">password is not set..!</div>';
        }else{
            if(preg_match("/^[a-z0-9-' ]+$/i",$_POST["password"]) && strlen($_POST["password"])>=8){
                $password = val($_POST["password"]);
            }
            else{
                $not_password = '<div class="alert alert-danger" role="alert">Unvalid password..!</div>';
            }
        }
        if(isset($_POST["gender"]) && $_POST["gender"] == 'Male'){
            $gender = $_POST["gender"];
        }elseif(empty($_POST["gender"]) && $_POST["gender"] == 'Female'){
            $gender = $_POST["gender"];
        }elseif(empty($_POST["gender"]) && $_POST["gender"] == 'others'){
            $gender = $_POST["gender"];
        }else{
            $err_gender = '<div class="alert alert-danger" role="alert">Gender requerd..!</div>';
        }
    }

    function val($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM VALIDATE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

        <div class="container">
            <div class="row mt-5">
                <div class="col-6">
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail3">
                        </div>
                        <?php echo $err_email; ?>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword3">
                        <?php echo $err_password; echo $not_password; ?>
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                        <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male">
                            <label class="form-check-label" for="gridRadios1">
                            Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female">
                            <label class="form-check-label" for="gridRadios2">
                            Female
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gridRadios3" value="others">
                            <label class="form-check-label" for="gridRadios3">
                            Others
                            </label>
                        </div>
                        </div>
                        <?php echo $err_gender; ?>
                    </fieldset>
                    <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
                </form>
                </div>
                <div class="col-6"></div>
            </div>
        </div>

<?php

    echo 'Your email: ',$email,'<br/>';
    echo 'Your password: ',$password,'<br/>';
    echo 'Your Gender: ',$gender,'<br/>';

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>