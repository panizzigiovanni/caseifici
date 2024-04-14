<?php 
    include "connection.php"; 
    session_start(); 

    if(!isset($_SESSION['codiceCaseificio'])){
        header("Location: index.php");
        exit();
    }
    $codCas=$_SESSION['codiceCaseificio'];


    function getCurrentDay() {
        $currentDate = new DateTime();
        return $currentDate->format('d-m-Y');
    }
?>



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

        }

        .divgrande{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #795458;
            margin-bottom: 20px;
            border: 2px solid #FFC94A;
            border-radius: 10px;
            color:#FFC94A;
            margin:20px; 
            min-width: 90%
        }

        .divsopra {
            
            padding: 10px;
            background-color: #795458;
            margin-bottom: 20px;
            border: 2px solid #FFC94A;
            border-radius: 10px;
            color:#FFC94A;
            margin:20px; 
        }

        .divsotto{
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #795458;
            margin-bottom: 20px;
            border: 2px solid #FFC94A;
            border-radius: 10px;
            color:#FFC94A;
            margin:20px; 

        }


        #my-table {
            width: 100%;
            height: auto;
           
        }

        #my-table thead {
            display: table-header-group;
            
           
        }

        #my-table tr {
            page-break-inside: avoid;
        }

        #my-table td,
        #my-table th {
            border: 1px solid #FFC94A;
            padding: 0.25rem;
            text-align: left;
            color: #FFC94A;
            border-radius: 4px;
        }

        #my-table th {
            background-color: #FFFEEF;
            color: black;
        }

        button {
            background-color: #FFC94A;
            border: none;
            padding: 10px ;
            color: #333;
            text-decoration: none;
            margin-left: 10px;
            cursor: pointer;
            border-radius: 10px; /* Make the buttons rounded */
            text-decoration: none;
            font-weight: bold;
            
        }

        input[type=text] {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
            font-size: 15px;
            font-weight: bold;
            color: #333;
            background-color: #fff;
        }

         
        
        input[type=date] {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
            font-size: 15px;
            font-weight: bold;
            color: #333;
            background-color: #fff;
          
        }

        select{
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
            font-size: 15px;
            font-weight: bold;
            color: #333;
            background-color: #fff;
        }
        

        .spazio-superiore {
            margin-top: 10px;
        }

        .spazio-inferiore{
            margin-bottom: 10px;
        }
        
    </style>
    <script>
        
        
    </script>
        
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
        <form action="reindForme.php" method="get"> 

           

        
            <div class="divsotto"> 

                <table id="my-table">
                    <thead>
                    <tr>
                        <th>Codice Univoco</th>
                        <th>Data produzione</th> 
                        <th>Progressivo</th>
                        <th>Stagionatura</th>
                        <th>Scelta</th>
                        <th>Selezionato</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php 
                        $sqlForme='SELECT for_Id,for_DataProduzione,for_Progressivo,for_Stagionatura,for_Scelta,for_Venduta FROM forme WHERE for_Venduta="0" AND for_cas_Id='.$codCas;
                    
                        $resul=$conn->query($sqlForme);

                        if(isset($resul)){
                            while($arrayAssocForme =$resul->fetch_assoc()){
                                foreach($arrayAssocForme as $chiave=>$valore){
                                    switch ($chiave) {
                                        case "for_Id":
                                            $id = $valore;
                                            break;
                                        case "for_DataProduzione":
                                            $dataproduzione = $valore;
                                            break;
                                        case "for_Progressivo":
                                            $progressivo = $valore;
                                            break;
                                        case "for_Stagionatura":
                                            $stagionatura = $valore;
                                            $stagionatura=$stagionatura.' Mesi';
                                            break;
                                        case "for_Scelta":
                                            $scelta = $valore;
                                            $valore=='1'? $scelta ='Prima Scelta' : $scelta ='Seconda Scelta';
                                            break;
                                        case "for_Venduta":
                                            $venduta = $valore;
                                            break;
                                    }
                                }

                                

                                echo "<tr>";
                                echo "<td>" . $id . "</td>";
                                echo "<td>" . $dataproduzione. "</td>";
                                echo "<td>" . $progressivo . "</td>";
                                echo "<td>" . $stagionatura . "</td>";
                                echo "<td>" . $scelta . "</td>";
                                if($venduta==1){
                                    echo '<td></td>';
                                }else{
                                    echo '<td><input type="checkbox" id="for_Id" name="for_Id'.$id.'" value= "'.$id.'"></td>';
                                }
                                
                                echo "</tr>";

                            }
                        }

                    ?>
                    
                    <!-- Add more rows as needed -->
                    </tbody>
                </table>
            
            </div>

            <div class="divgrande">   
                <div class="divsopra">
                    <h3>Vendita</h3>

                        <h4>Cliente Normale</h4>
                    
                        <div class="spazio-superiore">
                            <label for="item-input">Acquirente:</label>
                            <select name="id_Cliente" id="id_Cliente">
                                <?php 
                                
                                    $query = "SELECT cli_Id,cli_Nome FROM clienti";

                                    $resul=$conn->query($query);

                                    while($arrayAssocClienti =$resul->fetch_assoc()){
                                        foreach($arrayAssocClienti as $chiave=>$valore){
                                            if($chiave=="cli_Id"){
                                                $id= $valore;
                                            }else{
                                                $nome=$valore;
                                            }
                                        }
                                        echo "<option value='".$id."'>".$valore."</option>";
                                    }
                                ?>
                            </select>
                            <br>
                        </div>


                        <div class="spazio-superiore">
                            <button type="submit"  name="action" value="vendi">Vendi</button>
                        </div>         
                    
                </div>
                </form>

                <div class="divsopra"> 
                        <form action="modificaForma.php">
                            <h3>Modifica</h3>
                            <div class="spazio-superiore">
                                <label>Codice della forma:</label>
                                <input type="text" id="for_Id" name="for_Id">
                            </div>

                            <div class="spazio-superiore">   
                                <button type="submit">Modifica</button>
                            </div> 
                        </form>
                </div>
            </div>
        
    </div>

</body>
</html>