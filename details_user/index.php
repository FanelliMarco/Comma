<?php
define("TITLE", "Comma - Details User");
include "../assets/layouts/header.php";
require_once "../assets/includes/data_functions.php";
require '../assets/includes/query_include.php';
//include "./includes/details_include.php";
check_logged_in();
check_licenziato();
if(!isset($_SESSION['admin']))
        header("Location: ../");
$result=db_get_impiegato_spec($_GET['id']);
?>

<!-- Non conformità -->
<section class="p-3 w-100 d-flex align-items-center justify-content-center">
    <span class="page_subtitle text-uppercase text-light">dettagli utente</span>
</section>

<!-- Form container -->
<section>
    <div class="container mt-5">
        <form class="h4 text-light text-align-start" action="./includes/edit_include.php" method="post">
            <!-- Per ogni riga -->
            <!-- Riga Numero -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">matricola:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="id"><?php echo $result[0]['Matricola']; ?></span>
                </div>
            </div>

            <!-- Riga tipo -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">Nome:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="tipo"><?php echo $result[0]['Nome'] ?></span>
                </div>
            </div>

            <!-- Riga data -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">Cognome:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="data"><?php echo $result[0]['Cognome'] ?></span>
                </div>
            </div>

            <!-- Riga stato-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">Username:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="stato"><?php echo $result[0]['Username'] ?></span>
                </div>
            </div>

            <!-- Riga priorità-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">Tipo:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="priorita"><?php echo $result[0]['Tipo'] ?></span>
                </div>
            </div>

            <!-- Riga origine-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">Processo:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="origine"><?php echo $result[0]['Processo'] ?></span>
                </div>
            </div>

            <!-- Riga descrizione-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">creato il giorno:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="descrizione"><?php echo $result[0]['created_at'] ?></span>
                </div>
            </div>

            <!-- Riga semilavorato-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">Ultimo aggiornamento:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="semilavorato"><?php echo $result[0]['updated_at'] ?></span>
                </div>
            </div>

            <!-- Riga segnalatore-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">cancellato il giorno:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="segnalatore"><?php echo $result[0]['deleted_at'] ?></span>
                </div>
            </div>

            <!-- Riga risolutore-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">Ultimo accesso il giorno:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="risolutore"><?php echo $result[0]['last_login_at'] ?></span>
                </div>
            </div>

        </form>
    </div>
</section>


<!-- bottoni - link -->
<section class="container p-5">
    <div class="row">
            <div class="col-md-6 col-sm-12 text-center py-3">
                <a href="../edit_user/index.php?matricola=<?php echo $result[0]['Matricola'];?>"><button class="btn btn-warning btn-lg text-uppercase w-75" type="button" id="">modifica</button></a>
            </div>
            <div class="col-md-6 col-sm-12 text-center py-3">
                <a href="../licenzia?matricola=<?php echo $result[0]['Matricola'] ?>"><button class="btn btn-danger btn-lg text-uppercase w-75" type="button" id="">elimina</button></a>
            </div>
    </div>
</section>

<?php
include "../assets/layouts/footer.php";
?>