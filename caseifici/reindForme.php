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


    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    
        // Verifica quale pulsante è stato premuto
        switch ($action) {
            case 'vendi':
                
                $idCliente = $_GET['id_Cliente'];

                // Query SQL per l'inserimento delle vendite
                $sqlInsertVendita = "INSERT INTO vendite (ven_Data, ven_cli_Id, ven_for_Id) VALUES (CURRENT_DATE(), ?, ?)";

                $sqlUpdateForme = "UPDATE forme SET for_Venduta = 1 WHERE for_Id = ?";

                // Prepara la query
                $stmt = $conn->prepare($sqlInsertVendita);

                $stmt2 = $conn->prepare($sqlUpdateForme);
                
                echo $sqlInsertVendita;

                // Verifica se la preparazione della query è avvenuta con successo
                if ($stmt&&$stmt2) {
                    // Associa i parametri della query
                    $stmt->bind_param("ii", $idCliente, $idForma);

                    // Se $idForme è un array, esegui l'inserimento per ogni idForma
                    foreach ($_GET as $key => $value) {
                        // Verifica se la chiave inizia con 'for_Id'

                        if (strpos($key, 'for_Id') === 0) {
                            // Estrai l'id della forma dalla chiave
                            $idForma = substr($key, 6); 
                            $idFormaInt = (int)$idForma;

                            $stmt2->bind_param("i", $idFormaInt);
                            $stmt2->execute();
            
                            // Esegui la query
                            $stmt->execute();
                        }
                    }

                    // Chiudi lo statement
                    $stmt->close();
                } else {
                    // Gestisci eventuali errori nella preparazione della query
                    echo "Errore nella preparazione della query: " . $conn->error;
                }

                // Chiudi la connessione al database
                $conn->close();

                break;
            
            case 'modifica':
              
                if(isset($_GET['for_Id']) && isset($_GET['data_Nuova']) && isset($_GET['prog_Nuova']) && isset($_GET['scelta_Nuova'])) {
                    // Prepara la query per l'aggiornamento
                    $sql = "UPDATE forme SET for_DataProduzione=?, for_Progressivo=?, for_Scelta=? WHERE for_Id=?";
                
                    // Esegue la query preparata
                    if($stmt = $conn->prepare($sql)) {
                        // Associa i parametri alla query preparata
                        $stmt->bind_param("sssi", $_GET['data_Nuova'], $_GET['prog_Nuova'], $_GET['scelta_Nuova'], $_GET['for_Id']);
                
                        // Esegui la query
                        if($stmt->execute()) {
                            echo "Forma aggiornata con successo.";
                        } else {
                            echo "Errore durante l'aggiornamento della forma: " . $conn->error;
                        }
                
                        // Chiudi lo statement
                        $stmt->close();
                    } else {
                        echo "Errore nella preparazione della query: " . $conn->error;
                    }
                } else {
                    echo "Parametri mancanti nella richiesta GET.";
                }
                break;
            case 'elimina':
                if(isset($_GET['for_Id'])) {
                    // Ottieni l'id della forma dalla richiesta GET
                    $forma_id = $_GET['for_Id'];
                
                    // Query SQL per eliminare la forma dal database
                    $query = "DELETE FROM forme WHERE for_Id = ?";
                
                    // Prepara la query
                    $stmt = $conn->prepare($query);
                
                    // Collega il parametro dell'id della forma alla query
                    $stmt->bind_param("i", $forma_id);
                
                    // Esegui la query
                    if($stmt->execute()) {
                        echo "Forma eliminata con successo.";
                    } else {
                        echo "Si è verificato un errore durante l'eliminazione della forma.";
                    }
                
                    // Chiudi lo statement e la connessione al database
                    $stmt->close();
                    break;
                }
            default:
                break;
        }

        header("Location: gestioneForme.php");
        exit();

    }














?>