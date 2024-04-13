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

        input[type=number] {
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
        <input type="hidden" name="for_Id" value="<?php echo $_GET['for_Id'];?>">
            <div class="divsotto"> 

                <table id="my-table">
                    <thead>
                    <tr>
                        <th>Data produzione</th> 
                        <th>Progressivo</th>
                        <th>Scelta</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php 
                         $sqlForme='SELECT for_Id,for_DataProduzione,for_Progressivo,for_Scelta,for_Venduta FROM forme WHERE for_Id="'.$_GET['for_Id'].'" AND for_cas_Id='.$codCas;
                    
                         $resul=$conn->query($sqlForme);
 
                         if(isset($resul)){
                             while($arrayAssocForme =$resul->fetch_assoc()){
                                 foreach($arrayAssocForme as $chiave=>$valore){
                                     switch ($chiave) {
                                         case "for_DataProduzione":
                                             $dataproduzione = $valore;
                                             break;
                                         case "for_Progressivo":
                                             $progressivo = $valore;
                                             break;
                                         case "for_Scelta":
                                             $scelta = $valore;
                                             if($scelta==1){
                                                $s1= 'selected';
                                                $s2= '';
                                             }else{
                                                $s1= '';
                                                $s2= 'selected';
                                             }
                                             break;
                                     }
                                 }
 
                                 
 
                                echo "<tr>";
                                echo '<td> <input type="date" id="data_Nuova" name="data_Nuova" value="'.$dataproduzione.'" ></td>';
                                echo '<td><input type="number" id="prog_Nuova" name="prog_Nuova" value="'.$progressivo.'" ></td>';
                                echo "<td>";
                                echo '<select name="scelta_Nuova">';
                                echo '<option value="1" '.$s1.'>Prima Scelta</option>';
                                echo '<option value="0" '.$s2.'>Seconda Scelta</option>';
                                echo '</select>';
                                echo "</td>";
                                echo "</tr>";
 
                             }
                         }else{
                            echo "ID non esistente";
                         }

                    ?>
                    
                    
                    </tbody>
                </table>
            
            </div>



            <div class="spazio-superiore">
                <button type="submit" name="action" value="modifica">Modifica</button>
            </div>  
            
            <div class="spazio-superiore">
                <button type="submit" name="action" value="elimina">Elimina</button>
            </div>
        </form>
    </div>

</body>
</html>