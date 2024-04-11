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
                include 'connection.php';

                $username=$_POST['username'];
                $password=$_POST['password'];

                
                //$passCrypt=md5($password);
                $passCrypt=$password;

                $sql='SELECT * FROM utenti WHERE ut_username="'.$username.'"';

                $resul=$conn->query($sql);
                
                if($resul->num_rows >0){

                    $row=$resul->fetch_assoc();
                    
                    if($row["ut_password"]==$passCrypt){

                        $idUtente=$row["ut_Id"];
                        
                        $sql2='SELECT cas_Id FROM caseifici WHERE cas_ut_Id="'. $idUtente.'"';

                        $resul2=$conn->query($sql2);

                        if($resul2->num_rows >0){

                            $row2=$resul2->fetch_assoc();

                            $_SESSION['codiceCaseificio']=$row2['cas_Id'];
                            echo $_SESSION['codiceCaseificio'];

                            header("Location: index.php");
                            exit();
                        }else{
                            echo "Il tuo account non e' collegato a nessun caseificio";
                        }
                    }else{

                        echo "Password sbagliata riprova";
                      
                    }
                        
                }else{
                        echo "Account non esistente";
                }

               
                $conn->close();
        ?>

        </form>
    </div>
</body>