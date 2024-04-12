

<?php 
    include "connection.php"; 
    session_start(); 

    if(!isset($_SESSION['codiceCaseificio'])){
        header("Location: index.php");
        exit();
    }

    function getCurrentDay() {
        $currentDate = new DateTime();
        return $currentDate->format('Y-m-d');
    }
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
        }

        .header h1 {
            margin: 0;
            color: #FFC94A;
        }

        

        .buttons {
            display: flex;
            align-items: center;
        }

        .button-containers {
            display: flex;
            justify-content: space-between;
            padding: 10px;
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
            background-color: #FFFEEF;
            border: 2px solid #FFC94A;
            border-radius: 10px;
            margin:20px;
            padding: 10px;

        }


        .bottoneGenerico{
            background-color: #FFC94A;
            border: none;
            padding: 10px;
            color: #333;
            text-decoration: none;
            margin-left: 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 10px; 
            text-decoration: none;
            font-weight: bold;
            
        }

        
        
        
        
    </style>
    <script>
       

        
    </script>
        
</head>





<body>
    <div class="header">
        <h1>Consorizio Caseifici</h1>
        
        <div class="button-containers">
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
            $oggi=getCurrentDay();
            echo '<a href=inserimentoGiornataLav.php?dataQuery='.$oggi.'>';
           
        ?>        
        <button type="button" class="bottoneGenerico">Inserisci Giornata Lavorativa</button>
        </a>

        <a href="gestioneForme.php">
        <button type="button" class="bottoneGenerico">Gestione Forme</button>
        </a>

        <a href="gestioneVendite.php">
        <button type="button" class="bottoneGenerico">Gestione Vendite</button>
        </a>  

    </div>

</body>
</html>