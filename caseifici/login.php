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
                <input type="submit" value="Login" class="btn btn-primary btn-block"/>
            </div>  
        </form>

     

    </div>
</body>
</html>