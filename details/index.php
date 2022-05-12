<?php
define("TITLE", "Comma - Details");
include "../assets/layouts/header.php";
require_once "../assets/includes/data_functions.php";
require '../assets/includes/query_include.php';
//include "./includes/details_include.php";
check_logged_in();
check_licenziato();
$result=db_get_nc($_GET['id'], 'interna');
?>

<!-- Non conformità -->
<section class="p-3 w-100 d-flex align-items-center justify-content-center">
    <span class="page_subtitle text-uppercase text-light">dettagli non conformità</span>
</section>

<!-- Form container -->
<section>
    <div class="container mt-5">
        <form class="h4 text-light text-align-start" action="./includes/edit_include.php" method="post">
            <!-- Per ogni riga -->
            <!-- Riga Numero -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">numero:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="id"><?php echo $result[0]['numero']; ?></span>
                </div>
            </div>

            <!-- Riga tipo -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">tipo:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="tipo"><?php echo $result[0]['tipo'] ?></span>
                </div>
            </div>

            <!-- Riga data -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">data:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="data"><?php echo $result[0]['data'] ?></span>
                </div>
            </div>

            <!-- Riga stato-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">stato:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="stato"><?php echo $result[0]['stato'] ?></span>
                </div>
            </div>

            <!-- Riga priorità-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">priorità:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="priorita"><?php echo $result[0]['priorita'] ?></span>
                </div>
            </div>

            <!-- Riga origine-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">origine:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="origine"><?php echo $result[0]['origine'] ?></span>
                </div>
            </div>

            <!-- Riga descrizione-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">descrizione:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="descrizione"><?php echo $result[0]['descrizione'] ?></span>
                </div>
            </div>

            <!-- Riga semilavorato-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">semilavorato:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="semilavorato"><?php echo $result[0]['oggetto'] ?></span>
                </div>
            </div>

            <!-- Riga segnalatore-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">segnalatore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="segnalatore"><?php echo $result[0]['segnalatore'] ?></span>
                </div>
            </div>

            <!-- Riga risolutore-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">risolutore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="risolutore"><?php echo $result[0]['risolutore'] ?></span>
                </div>
            </div>

            <!-- Riga verificatore-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">verificatore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="verificatore"><?php echo $result[0]['verificatore'] ?></span>
                </div>
            </div>

            <!-- Riga decisione -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">decisione:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="decisione"><?php echo $result[0]['decisioni'] ?></span>
                </div>
            </div>

            <!-- Riga azioni correttive-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">azioni correttive:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name="az_corr"><?php echo $result[0]['az_corr'] ?></span>
                </div>
            </div>
        </form>
    </div>
</section>


<!-- bottoni - link -->
<section class="container p-5">
    <div class="row">
            <div class="col-md-6 col-sm-12 text-center py-3">
                <a href="../edit/index.php?numero=<?php echo $result[0]['numero'];?>&tipo=<?php echo $result[0]['tipo'] ?>"><button class="btn btn-warning btn-lg text-uppercase w-75" type="button" id="">modifica</button></a>
            </div>
            <div class="col-md-6 col-sm-12 text-center py-3">
                <a href="../report/"><button class="btn btn-danger btn-lg text-uppercase w-75" type="button" id="">segnala</button></a>
            </div>
    </div>
</section>

<?php
include "../assets/layouts/footer.php";
?>