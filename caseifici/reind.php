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

    $dataInserimento=$_GET['data'];
    $codiceCas=$_SESSION['codiceCaseificio'];


    /////PARTE DI VENDITE//////////////////////////////////////
    $sqlVendite='SELECT f.* FROM vendite v JOIN forme f ON v.ven_for_Id = f.for_Id WHERE v.ven_Data = "'.$dataInserimento.'" AND f.for_cas_Id = '.$codiceCas;
   
  
    
    echo "</br>";
    $resul=$conn->query($sqlVendite);

    $numFormeVendute=$resul->num_rows;

    ////////////////////////////////////////////////////////

    $gioLav_date = $dataInserimento;
    $gioLav_LatteLavo = $_POST['gioLav_latteLavo'];
    $gioLav_LatteFormag = $_POST['gioLav_latteFormag'];
    $gioLav_QuaPro = $_POST['gioLav_quanPro'];
    $gioLav_QuaVend = $numFormeVendute;
    $gioLav_cas_Id = $codiceCas;

    if($_SESSION['radice']=="U"){
        ///UPDATE

        $data = $dataInserimento; // La data della giornata lavorativa da aggiornare
        $quantita_latte = $gioLav_LatteLavo; // La nuova quantità di latte
        $quantita_latte_formaggio = $gioLav_LatteFormag; // La nuova quantità di latte per formaggio
        
        // Query per l'aggiornamento dei campi basato sulla data
        $sqlAggiorno = "UPDATE giornatelav SET gioLav_LatteLavo = ?, gioLav_LatteFormag = ? WHERE gioLav_date = ?";
        
        // Preparazione della query
        $stmt = $conn->prepare($sqlAggiorno);
        
        // Associazione dei parametri
        $stmt->bind_param("iis", $quantita_latte, $quantita_latte_formaggio, $data);
        
        // Esecuzione della query
        if ($stmt->execute()) {
            echo "Aggiornamento eseguito con successo.";
            $errore="ok";
        } else {
            echo "Errore durante l'aggiornamento: " . $conn->error;
            $errore=$conn->error;
        }


        header("Location: inserimentoGiornataLav.php?response=".$errore);
        exit();
    }else if($_SESSION['radice']=="I"){
        ///INSERt
        // Prepara la query SQL
        $sql = "INSERT INTO giornatelav (gioLav_date, gioLav_LatteLavo, gioLav_LatteFormag, gioLav_QuaPro, gioLav_QuaVend, gioLav_cas_Id) VALUES (?, ?, ?, ?, ?, ?)";

        // Prepara la dichiarazione
        $stmt = $conn->prepare($sql);

        // Associa i parametri con i valori
        $stmt->bind_param("siiiii", $gioLav_date, $gioLav_LatteLavo, $gioLav_LatteFormag, $gioLav_QuaPro, $gioLav_QuaVend, $gioLav_cas_Id);

        // Esegue la query preparata
        if ($stmt->execute()) {
            echo "Dati inseriti correttamente.";
        } else {
            echo "Errore durante l'inserimento dei dati: " . $stmt->error;
        }


        $quantita12Mesi=$_POST['quantita12'];
        $quantita24Mesi=$_POST['quantita24'];
        $quantita30Mesi=$_POST['quantita30'];
        $quantita36Mesi=$_POST['quantita36'];

        // Array di forme da inserire
        $forme_da_inserire = array();

        // Data di produzione delle forme
        $dataProduzione = $dataInserimento;

        $mese = date('m', strtotime($dataProduzione)); // Estrai il mese (formato numerico)
        $anno = date('Y', strtotime($dataProduzione));

        $sqlProgressivo='SELECT for_Progressivo
            FROM forme
            WHERE YEAR(for_DataProduzione)='.$anno.' AND MONTH(for_DataProduzione)='.$mese.' AND for_cas_Id='.$codiceCas.'
            ORDER BY for_DataProduzione DESC
            LIMIT 1';

        $resul=$conn->query($sqlProgressivo);  

        $risultatoProg=$resul->fetch_assoc();

        // Progressivo iniziale delle forme
        $progressivo = isset($risultatoProg['for_Progressivo'])?$risultatoProg['for_Progressivo']:0;

        // Funzione per inserire le forme in base alla stagionatura
        function inserisciForme($quantita, $stagionatura, &$arrayForme, &$progressivo, $dataProduzione) {
            for ($i = 0; $i < $quantita; $i++) {
                $arrayForme[] = array(
                    'for_DataProduzione' => $dataProduzione,
                    'for_Venduta' => 0,
                    'for_Progressivo' => $progressivo,
                    'for_Stagionatura' => $stagionatura,
                    'for_Scelta' => 1,
                    'for_cas_Id' => 1 // Modifica l'ID del caseificio se necessario
                );
                $progressivo++;
            }

            return $progressivo;
        }

        // Inserisci forme con stagionatura di 12 mesi
        $prog1=inserisciForme($quantita12Mesi, '12', $forme_da_inserire, $progressivo, $dataProduzione);

        // Inserisci forme con stagionatura di 24 mesi
        $prog2=inserisciForme($quantita24Mesi, '24', $forme_da_inserire, $prog1, $dataProduzione);

        // Inserisci forme con stagionatura di 30 mesi
        $prog3=inserisciForme($quantita30Mesi, '30', $forme_da_inserire, $prog2, $dataProduzione);

        // Inserisci forme con stagionatura di 36 mesi
        inserisciForme($quantita36Mesi, '36', $forme_da_inserire, $prog3, $dataProduzione);

        
        // Query per l'inserimento delle forme
        $sql = "INSERT INTO forme (for_DataProduzione, for_Venduta, for_Progressivo, for_Stagionatura, for_Scelta, for_cas_Id) VALUES (?, ?, ?, ?, ?, ?)";
        
       

        // Prepara la dichiarazione
        $stmt = $conn->prepare($sql);
        
        // Associa i parametri con i valori e esegui la query per ogni forma da inserire
        foreach ($forme_da_inserire as $forma) {
            $stmt->bind_param("siiiii", $forma['for_DataProduzione'], $forma['for_Venduta'], $forma['for_Progressivo'], $forma['for_Stagionatura'], $forma['for_Scelta'], $forma['for_cas_Id']);
            // Esegue la query preparata
            if ($stmt->execute()) {
               echo "Nuova forma inserita correttamente.<br>";
               $errore="ok";
            } else {
               echo "Errore durante l'inserimento della nuova forma: " . $stmt->error . "<br>";
               $errore=$stmt->error;
            }
        }


        // Chiudi la dichiarazione
        $stmt->close();

        header("Location: inserimentoGiornataLav.php?response=".$errore."");
        exit();
    }
   

   

?>