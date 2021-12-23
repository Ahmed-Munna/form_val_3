<?php
    $name=$email=$password=$number=$web=$comment='';
    $err_name=$err_email=$err_password=$err_number=$err_web=$err_comment='';
    $not_name=$not_email=$not_password=$not_number=$not_web=$not_comment='';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST["name"])){
            $err_name = 'Empty name fild';
        }else{
            if(preg_match("/^[a-z-' ]+$/i",$_POST["name"])){
                $name = val($_POST["name"]);
            }else{
                $not_name = 'Only Alfabate alowed';
            }
        }
        if(empty($_POST["email"])){
            $err_email = 'Empty email fild';
        }else{
            if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
                $email = val($_POST["email"]);
            }else{
                $not_email = 'Only valid email alowed';
            }
        }
        if(empty($_POST["number"])){
            $err_number = 'Empty number fild';
        }else{
            if(preg_match("/^(\+88)?[0-9]{11}+$/i",$_POST["number"])){
                $number = val($_POST["number"]);
            }else{
                $not_number = 'Only valide number alowed';
            }
        }
        if(empty($_POST["password"])){
            $err_password = 'Empty password fild';
        }else{
            if(preg_match("/^[a-z0-9-' ]+$/i",$_POST["password"]) && strlen($_POST["password"])>=8){
                $password = val($_POST["password"]);
            }else{
                $not_password = 'Only valide password and min 8 charecter alowed';
            }
        }
        if(empty($_POST["web"])){
            $err_web = 'Empty web fild';
        }else{
            if(filter_var($_POST["web"],FILTER_VALIDATE_URL)){
                $web = val($_POST["web"]);
            }else{
                $not_web = 'web not valid';
            }
        }
        if(isset($_POST["comment"])){
            $comment = val($_POST["web"]);
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
    <title>FORM VALIDATION</title>
</head>
<body>
    




    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <input type="text" name="name" placeholder="Your name"><br><br>
        <input type="email" name="email" placeholder="Your email"><br><br>
        <input type="password" name="password" placeholder="Your password"><br><br>
        <input type="text" name="number" placeholder="Your number"><br><br>
        <input type="text" name="web" placeholder="Website link"><br><br>
        <textarea name="comment" cols="30" rows="10"></textarea><br><br>
        <input type="submit" name="submit">
    </form>

    <h3>Validation</h3>
    <?php
    
    echo '==>', $name;
    echo '==>', $email;
    echo '==>', $password;
    echo '==>', $number;
    echo '==>', $web;
    echo '==>', $comment;
    ?>
    <h3>ERROR</h3>

    <?php
    
    echo '==>', $err_name;
    echo '==>', $err_email;
    echo '==>', $err_password;
    echo '==>', $err_number;
    echo '==>', $err_web;
    echo '==>', $err_comment;
    
    ?>

    <h3>Invalidation</h3>

    <?php
    
    echo '==>', $not_name;
    echo '==>', $not_email;
    echo '==>', $not_password;
    echo '==>', $not_number;
    echo '==>', $not_web;
    echo '==>', $not_comment;
    ?>




</body>
</html>