
<?php 
    include "connection.php"; 
    session_start(); 

    if(!isset($_SESSION['codiceCaseificio'])){
        header("Location: index.php");
        exit();
    }

    $caseificio_id=$_SESSION['codiceCaseificio'];

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

        

       
        <div class="divsotto"> 

            <table id="my-table">
                <thead>
                    <tr>
                        <th>Data vendita</th>
                        <th>Nome cliente</th>
                        <th>Id forma</th>
                        <th>Stagionatura</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                       $query = "SELECT v.*, f.for_Stagionatura
                       FROM vendite v
                       JOIN forme f ON v.ven_for_Id = f.for_Id
                       WHERE f.for_cas_Id = ".$caseificio_id; // Sostituisci $caseificio_id con l'ID del caseificio desiderato

                       // Eseguiamo la query
                       $result = $conn->query($query);

                       $query2 = "SELECT cli_Id, cli_Nome FROM clienti";

                        // Esecuzione della query
                        $result2 = $conn->query($query2);

                        // Inizializzazione dell'array associativo
                        $clienteArray = array();

                        // Se ci sono risultati, li memorizziamo nell'array associativo
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {
                                // Chiave: ID del cliente, Valore: Nome del cliente
                                $clienteArray[$row['cli_Id']] = $row['cli_Nome'];
                            }
                        }

                        $query3 = "SELECT for_Id, for_Stagionatura FROM forme WHERE for_cas_Id=".$caseificio_id;

                        // Esecuzione della query
                        $result3 = $conn->query($query3);

                        // Inizializzazione dell'array associativo
                        $formeArray = array();

                        // Se ci sono risultati, li memorizziamo nell'array associativo
                        if ($result3->num_rows > 0) {
                            while ($row = $result3->fetch_assoc()) {
                                // Chiave: ID della forma, Valore: Stagionatura della forma
                                $formeArray[$row['for_Id']] = $row['for_Stagionatura'];
                            }
                        }
                       
                        // Se ci sono risultati, li salviamo in variabili
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                foreach($row as $key => $val ){
                                    if($key=='ven_Data'){
                                        $data=$val;
                                    }else if($key=='ven_cli_Id'){
                                        $idCliente=$val;
                                    }else if($key=='ven_for_Id'){
                                        $stag=$val;
                                    }
                                }
                                echo '<tr>';
                                echo "<td>".$data."</td>";
                                echo "<td>".$clienteArray[$idCliente]."</td>";
                                echo "<td>".$stag."</td>";
                                echo "<td>".$formeArray[$stag]."</td>";
                                echo '</tr>';
                            }
                        }



                    ?>
                </tbody>
            </table>
          
        </div>
    </div>

</body>
</html>