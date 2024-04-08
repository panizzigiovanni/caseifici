<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f0f0f0;
        }
        .login-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            width: 400px;
            margin: 50px auto;
            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
        }
        .submit-btn {
            margin-top: 20px;
        }
        .bottonifigi {
            background-color: #1c94e0;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
        }
        .bottonifigi:hover {
            background-color: #1572a7;
        }
    </style>
</head>
<body>
    <div class="login-container">
        
        <?php
                session_start();
                include 'conection.php';

                $username=$_POST['username'];
                $password=$_POST['password'];

                
                $passCrypt=md5($password);

                $sql='SELECT * FROM utenti WHERE ut_username="'.$username.'" OR  ut_email="'.$username.'"';

                $resul=$conn->query($sql);
                
                if($resul->num_rows >0){

                    $row=$resul->fetch_assoc();
                    
                    if($row["ut_password"]==$passCrypt){
                        
                        
                        $_SESSION['log']=true;

                        header("Location: tabprincip.php");
                        exit();
                    }else{

                        echo "Password sbagliata riprova";
                        echo '<a href="registrazione.htm"> ';                        
                        echo '<button class="bottonifigi btn-block">Registrati</button>';
                        echo'</a>';
                    }
                        
                }else{
                        echo "Account non esistente riprova clicca il bottone per andare nella pagine di registrazione <br>";
                        echo '<a href="registrazione.htm"> ';                        
                        echo '<button class="bottonifigi btn-block">Registrati</button>';
                        echo'</a>';

                }

               
                $conn->close();
        ?>

        </form>
    </div>
</body>