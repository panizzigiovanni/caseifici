
<?php 
    include "connection.php"; 
    session_start(); 
?>


<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Consorizio Caseifici</title>
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #453F78;
            
        }

        .header {
            background-color: #795458;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 1000;
        }

        .header h1 {
            margin: 0;
            color: #FFC94A;
        }


        .buttons {
            display: flex;
            align-items: center;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            background-color: #795458;/* Optional: Add a background color to the div */
        }
        .button {
            background-color: #FFC94A;
            border: none;
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
            margin-left: 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 10px; /* Make the buttons rounded */
            text-decoration: none;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
        }

        .card {
            background-color: #FFFEEF;
            color: #333;
            width: 250px;
            height: 350px;
            margin: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 2px solid #FFC94A;
            border-radius: 20px;
            padding: 15px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .card-content {
            padding: 10px;
        }

        .card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
            border-radius: 10%;
        }

    </style> 
</head>


<body>
    <div class="header">
        <h1>Consorizio Caseifici</h1>
        <div class="button-container">
            <?php 
                if(isset($_SESSION['codiceCaseificio'])){
                    
                    echo'<a class="button" href="menuparteRiservata.php">Parte Riservata</a>';
                }
                
            ?>
            <a class="button" href="login.php">Login</a>
        </div>
    </div>
    
    <div class="container">
        <?php  
        
        
            $sqlCaseifici='SELECT * FROM caseifici';

            $resulCaseifici=$conn->query($sqlCaseifici);

            while($arrayAssocCaseifici=$resulCaseifici->fetch_assoc()){
                foreach ($arrayAssocCaseifici as $attributo=>$valore) {
                   
                    if($attributo=='cas_NomeCaseificio'){
                       $nome=$valore;
                    }else if($attributo=='cas_NomeTitolare'){
                        $nomeCapo=$valore;
                    }else if($attributo=='cas_Id'){
                        $id= $valore;
                    }
                   
                }

                
                echo '<div class="card">';
                echo '<img src="download.jpg" alt="image">';
                echo '<h2>'.$nome.'</h2>';
                echo '<p>'.$nomeCapo.'</p>';
                echo '<a class="button" href="caseificioTourDigi.php?codCaseificio='.$id.'">Scopri di piu</a>';
                echo '</div>';
                
            }


            

        ?>        
                
         <!--<div class="card">
            <img src="download.jpg" alt="image">
            <h2>Card Title</h2>
            <p>Description line 1</p>
            <p>Description line 2</p>
        </div>
        -->
    </div>

</body>
</html>