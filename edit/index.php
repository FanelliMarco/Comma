<?php
define("TITLE", "Comma - Login");
include "../assets/layouts/header.php";
include "./includes/edit_include.php";
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
            <div class="row align-items-center justify-content-center pb-4">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">numero:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <!--
                        BACKEND in base al valore inserito nel seguente input id="" name="" field,
                        i valore di default degli input id="" name="" successivi cambiano secondo
                        il contenuto del database
                    -->
                    <input type="text" value="1" class="form-control bg-transparent text-light" id="" name="" required>
                </div>
            </div>

            <!-- Riga data -->
            <div class="row align-items-center justify-content-center pb-4">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">data:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input id="" name="" type="date" class="form-control bg-transparent text-light">
                </div>
            </div>

            <!-- Riga stato-->
            <div class="row align-items-center justify-content-center pb-4">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">stato:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <div class="input-group">
                        <select class="form-control text-uppercase bg-transparent text-light" id="" name="" required>
                            <option selected class="text-dark">rilevata</option>
                            <option value="1" class="text-dark">in gestione</option>
                            <option value="1" class="text-dark">assegnata</option>
                            <option value="1" class="text-dark">in risoluzione</option>
                            <option value="1" class="text-dark">risolta</option>
                            <option value="1" class="text-dark">da verificare</option>
                            <option value="1" class="text-dark">non verificata</option>
                            <option value="1" class="text-dark">in verifica</option>
                            <option value="1" class="text-dark">verificata</option>
                            <option value="1" class="text-dark">conclusa</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Riga priorità-->
            <div class="row align-items-center justify-content-center pb-4">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">priorità:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <div class="input-group">
                        <select class="form-control text-uppercase bg-transparent text-light" id="" name="" required>
                            <option selected valuie="bassa" class="text-dark">bassa</option>
                            <option value="media" class="text-dark">media</option>
                            <option value="alta" class="text-dark">alta</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Riga origine-->
            <div class="row align-items-center justify-content-center pb-4">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">origine:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" class="form-control bg-transparent text-light" id="" name="" required>
                </div>
            </div>

            <!-- Riga descrizione-->
            <div class="row align-items-center justify-content-center pb-4">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">descrizione:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" class="form-control bg-transparent text-light" id="" name="">
                </div>
            </div>

            <!-- Riga semilavorato-->
            <div class="row align-items-center justify-content-center pb-4">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">semilavorato:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" class="form-control bg-transparent text-light" id="" name="" required>
                </div>
            </div>

            <!-- Riga segnalatore-->
            <div class="row align-items-center justify-content-center pb-4">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">segnalatore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" class="form-control bg-transparent text-light" id="" name="" required>
                </div>
            </div>

            <!-- Riga risolutore-->
            <div class="row align-items-center justify-content-center pb-4">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">risolutore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" class="form-control bg-transparent text-light" id="" name="" required>
                </div>
            </div>

            <!-- Riga verificatore-->
            <div class="row align-items-center justify-content-center pb-4">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">verificatore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" class="form-control bg-transparent text-light" id="" name="" required>
                </div>
            </div>

            <!-- Riga verificatore-->
            <div class="row align-items-center justify-content-center pb-4">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">verificatore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" class="form-control bg-transparent text-light" id="" name="" required>
                </div>
            </div>

            <!-- Riga azioni correttive-->
            <div class="row align-items-center justify-content-center pb-4">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">azioni correttive:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" class="form-control bg-transparent text-light" id="" name="" required>
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include "../assets/layouts/footer.php";
?>