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
        .dairy-info {
            text-align: left;
            padding: 20px;
            background-color: #795458;
            color: #FFC94A;
            width: 100%;
            border-radius: 10px;
            border: 2px solid #FFC94A;
        }

        .map {
            width: 40%;
            height: 300px;
            margin-top: 1%;
            margin-left:60%
            
        }

        .containerImmagini {
            display: flex;
            justify-content: center;
            background-color: #FFFEEF;
            margin: 20px;
            border: 2px solid #FFC94A;
            border-radius: 20px;
        }

        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
        }

        .image {
            width: auto;
            height: auto;
            object-fit: cover;
            margin: 10px;
            border: 2px solid #FFC94A;
            border-radius: 20px;
        }
        
    </style>

    
</head>





<body>
    <div class="header">
        <h1>Consorizio Caseifici</h1>
        
        <div class="button-containers">
        <a class="button" href="index.php">Homepage</a>
        <?php 
                if(isset($_SESSION['codiceCaseificio'])){

                    echo'<a class="button" href="menuparteRiservata.php">Parte Riservata</a>';
                }

            ?>
            <a class="button" href="login.php">Login</a>
        </div>
    </div>
    
    <div class="container">

        <div class="dairy-info">
            <?php
                

                $sqlCaseifici='SELECT * FROM caseifici WHERE  cas_Id= '.$_GET["codCaseificio"];    

                $resulCaseificio=$conn->query($sqlCaseifici);

                $arrayAssocCaseifici=$resulCaseificio->fetch_assoc();

                foreach ($arrayAssocCaseifici as $attributo=>$valore) {
                    if($attributo=='cas_NomeCaseificio'){
                        $nome=$valore;
                     }else if($attributo=='cas_Des'){
                        $des=$valore;
                     }else if($attributo=='cas_Id'){
                        $id= $valore;
                     }else if($attributo=='cas_linkGoogleMaps'){
                        $link=$valore;
                     }else if($attributo=='cas_Indirizzo'){
                        $indi=$valore;
                     }else if($attributo=='cas_pro_Id'){
                        $idPro=$valore;
                     }

                }
                
                $slqPro= "SELECT pro_Sigla FROM province WHERE pro_Id=".$idPro;

                $resulPro=$conn->query($slqPro);

                $arrayAssocPro=$resulPro->fetch_assoc();

                $siglaPro=$arrayAssocPro['pro_Sigla'];

                echo '<h2>'.$nome.'</h2>';
                echo '<p>'.$des.'</p>';
                echo 'Indirizzo:'.$indi.' Provincia:'.$siglaPro;
                echo '<iframe class="map" src="'.$link.'" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                
            ?>


            

            <div class="containerImmagini">
                <div class="image-container">
                    <?php 
                        $sqlImmagini='SELECT fot_Percorso FROM fotografie WHERE fot_cas_Id='.$_GET["codCaseificio"];

                        $resulFoto=$conn->query($sqlImmagini);

                        while($arrayAssocFoto=$resulFoto->fetch_assoc()){
                            $percorso=$arrayAssocFoto['fot_Percorso'];
                            echo '<img src="'.$percorso.'" alt="'.$percorso.'" class="image">';
                        }
                    ?>

                  

                </div>
            </div>
        </div>

        
        
    </div>

</body>
</html>