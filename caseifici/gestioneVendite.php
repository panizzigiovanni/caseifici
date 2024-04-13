
<?php 
    include "connection.php"; 
    session_start(); 

    if(!isset($_SESSION['codiceCaseificio'])){
        header("Location: index.php");
        exit();
    }

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
        // Get the input element
        document.addEventListener("DOMContentLoaded", function () {
        // Get the input element
        const dateInput = document.getElementById("date-input");

        // Set the value to the current date
        dateInput.value = new Date().toISOString().slice(0, 10);
        });
        
    </script>
        
</head>





<body>
    <div class="header">
        <h1>Consorizio Caseifici</h1>
        
        <div class="button-containers">
            <a class="button" href="#">Parte Riservata</a>
            <a class="button" href="#">Login</a>
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
                    <tr>
                        <td>12/43/32</td>
                        <td>Beppino</td>
                        <td>353</td>
                        <td>12 Mesi</td>
                        
                    
                    </tr>
                <!-- Add more rows as needed -->
                </tbody>
            </table>
          
        </div>
    </div>

</body>
</html>