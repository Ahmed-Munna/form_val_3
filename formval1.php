<?php

    $err_name=$err_email=$err_password=$err_number=$err_url=$err_comment="";
    $name=$email=$password=$number=$url=$comment="";
    $not_nam=$not_pass=$not_num=$not_url='';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST["name"])){
            $err_name = 'empty name <br/>';
        }else{
            if(preg_match("/^[a-z-' ]+$/i",$_POST["name"])){
                $name = val($_POST["name"]);
            }else{
                $not_nam = 'Only alfabate and space alawed!';
            }
        }
        if(empty($_POST["password"])){
            $err_password = 'empty password <br/>';
        }else{
            if(preg_match("/^[a-z0-9-' ]+$/i",$_POST["password"]) && strlen($_POST["password"])>=8){
                $password = val($_POST["password"]);
            }else{
                $not_pass= 'Only strong or minimum 8 charecter password alawed';
            }
        }
        if(empty($_POST["number"])){
            $err_number = 'empty number <br/>';
        }else{
            if(preg_match("/^(\+88)?[0-9]{11}+$/i",$_POST["number"])){
                $number= val($_POST["number"]);
            }else{
                $not_num= 'Only valid number alawed';
            }
        }
        if(empty($_POST["email"])){
            $err_email = 'empty email address <br/>';
        }else{
            $fil_email = $_POST["email"];
            if(filter_var($fil_email,FILTER_VALIDATE_EMAIL)){
                $email= val($_POST["email"]);
            }else{
                $not_mail= 'Only valid email';
            }
        }
        if(empty($_POST["url"])){
            $err_url = 'empty url address <br/>';
        }else{
            $fil_email = $_POST["url"];
            if(filter_var($fil_email,FILTER_VALIDATE_URL)){
                $url = val($_POST["url"]);
            }else{
                $not_url = 'Only valid url';
            }
        }
        if(isset($_POST["comment"])){
            $comment = val($_POST["comment"]);
        }
    }

    function val($seq){
        $seq = htmlspecialchars($seq);
        $seq = trim($seq);
        $seq = stripslashes($seq);
        return $seq;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM VALIDATION</title>
    <style>
        span{
            color:red;
            display: block;
        }
    </style>
</head>
<body>


    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <input type="text" name="name" placeholder="type your name">
        <span><?php echo $err_name; echo $not_nam; ?></span>
        <br><br>
        <input type="email" name="email" placeholder="type your email">
        <span><?php echo $err_email; $not_mail?></span>
        <br><br>
        <input type="password" name="password" placeholder="type your pasword">
        <span><?php echo $err_password; echo $not_pass; ?></span>
        <br><br>
        <input type="tel" name="number" value="+88" placeholder="type your number">
        <span><?php echo $err_number; echo $not_num; ?></span>
        <br><br>
        <input type="text" name="url" placeholder="URL">
        <span><?php echo $err_url; echo $not_url; ?></span>
        <br><br>
        <textarea name="comment" placeholder="comment" cols="30" rows="10"></textarea><br><br>
        <input type="submit" name="submit">
    </form>

    <h2>Form data</h2>

    <ul>
        <li><?php echo 'USER NAME: ', $name,'</br>'; ?></li>
        <li><?php echo 'USER EMAIL: ', $email,'</br>'; ?></li>
        <li><?php echo 'USER PASSWORD: ', $password,'<br/>' ; ?></li>
        <li><?php echo 'USER NUMBER: ',$number,'<br/>' ; ?></li>
        <li><?php echo 'USER WEBSITE LINK: ',$url, '<br/>' ; ?></li>
        <li><?php echo 'USER COMMENT: ',$comment, '<br/>' ; ?></li>
    </ul>

</body>
</html>