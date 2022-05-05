<?php
define("TITLE", "Comma - Login");
include "../assets/layouts/header.php";
include "./includes/details_include.php";
?>

<!-- Non conformità -->
<section class="p-3 w-100 d-flex align-items-center justify-content-center">
    <span class="page_subtitle text-uppercase text-light">modifica non conformità</span>
</section>

<!-- Form container -->
<section>
    <div class="container mt-5">
        <form class="h4 text-light text-align-start text-uppercase" action="./includes/edit_include.php" method="post">
            <!-- Per ogni riga -->
            <!-- Riga Numero -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">numero:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name=""></span>
                </div>
            </div>

            <!-- Riga data -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">data:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input id="" name="" type="date" class="form-control bg-transparent text-light">
                </div>
            </div>

            <!-- Riga stato-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">stato:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name=""></span>
                </div>
            </div>

            <!-- Riga priorità-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">priorità:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name=""></span>
                </div>
            </div>

            <!-- Riga origine-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">origine:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name=""></span>
                </div>
            </div>

            <!-- Riga descrizione-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">descrizione:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name=""></span>
                </div>
            </div>

            <!-- Riga semilavorato-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">semilavorato:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name=""></span>
                </div>
            </div>

            <!-- Riga segnalatore-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">segnalatore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name=""></span>
                </div>
            </div>

            <!-- Riga risolutore-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">risolutore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name=""></span>
                </div>
            </div>

            <!-- Riga verificatore-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">verificatore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name=""></span>
                </div>
            </div>

            <!-- Riga decisione -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">decisione:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name=""></span>
                </div>
            </div>

            <!-- Riga azioni correttive-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">azioni correttive:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <span class="" id="" name=""></span>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- conferma edit -->
<section class="p-5">
    <div class="row">
        <div class="col form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-primary w-25 text-uppercase" id="" name=''>
                <span class="form_control_font">conferma</span>
            </button>
        </div>
    </div>
</section>

<?php
include "../assets/layouts/footer.php";
?>