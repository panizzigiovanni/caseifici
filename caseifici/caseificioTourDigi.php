<?php 
    include "connection.php";  
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
        /*.slider-container
            {
                width: 800px;
                height: 400px;
                margin-left: auto;
                margin-right: auto;
                margin-top: 0px;
                text-align: center;
                overflow: hidden;
            }

            .image-container
            {
                width: 2400px;
                background-color: none;
                height: 400px;
                clear: both;
                position: relative;
            
                -webkit-transition: left 2s;
                -moz-transition: left 2s;
                -o-transition: left 2s;
                transition: left 2s;
            }

            #slider-image-1:target ~ .image-container
            {
            left: -400px;
            }
            #slider-image-2:target ~ .image-container
            {
            left: -1200px;
            }
            #slider-image-3:target ~ .image-container
            {
            left: -2300px;
            }

            .button-container
            {
                position: relative;
                justify-content: center;
                background-color: #795458;
                height: 10%;
                display: flex;
                top: -25px;
            }
            .slider-change
            {
                display: inline-block;
                height: 10px;
                width: 10px;
                border-radius: 5px;
                background-color: #FFC94A;
                margin:2px;
            }
        */
    </style>

    
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
                     }

                }

                echo '<h2>'.$nome.'</h2>';
                echo '<p>'.$des.'</p>';
                echo 'Indirizzo:'.$indi;
                echo '<iframe class="map" src="'.$link.'" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                
            ?>


            </div>

        <!--<div class="slider-container">
            <span id="slider-image-1"></span>
            <span id="slider-image-2"></span>
            <span id="slider-image-3"></span>
            <div class="image-container">
                <img src="csm_wandern-pause_a36d3d7b79.jpg" class="slider-image" />
                <img src="csm_familie_65b9cde00b.jpg" class="slider-image" />
                <img src="csm_wandern4_1dab218aca.jpg" class="slider-image" />
            </div>
            <div class="button-container">
                <a href="#slider-image-1" class="slider-change"></a>
                <a href="#slider-image-2" class="slider-change"></a>
                <a href="#slider-image-3" class="slider-change"></a>
            </div>
        </div>-->
        

        
        
    </div>

</body>
</html>