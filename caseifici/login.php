<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style>
         body {
            margin: 0;
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #453F78;
            
        }

        .buttons {
            display: flex;
            align-items: center;
        }

        .login-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
            background-color: #FFFEEF;
            border-radius: 10px;
            padding: 30px;
            width: 400px;
            margin: 50px auto;
            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
            border: 2px solid #FFC94A;
            border-radius: 20px;
        }
        .submit-btn {
            margin-top: 20px;
            justify-content: center;
        }
        .bottonifigi {
            background-color: #FFC94A;
            border: none;
            padding: 10px 20px;
            color: #333;
            margin-left: 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 10px; /* Make the buttons rounded */
            text-decoration: none;
        }
       
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center">Login Area riservata</h2>

        <form action="utppassDB.php" method="post">

            <div class="form-group">
                <label for="username">Username </label>
                <input type="text" id="username" name="username" class="form-control" required />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required />
            </div>
            
            <div class="submit-btn">
                <input type="submit" value="Login" class="btn btn-block bottonifigi"/>
            </div>  
        </form>

     

    </div>
</body>
</html>