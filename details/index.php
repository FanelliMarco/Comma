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
            <div class="row align-items-center justify-content-center pb-5">
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
            <div class="row align-items-center justify-content-center pb-5">
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
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">origine:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <div class="input-group">
                        <select class="form-control text-uppercase bg-transparent text-light" id="" name="" required>
                            <!-- BACKEND conviene creare gli option con una quey alla tabella: processi -->
                            <option selected class="text-dark">applicazione ologramma anticontraffazione</option>
                            <option value="1" class="text-dark">controllo qualita input</option>
                            <option value="1" class="text-dark">controllo stampa grafica</option>
                            <option value="1" class="text-dark">inserimento banda magnetica</option>
                            <option value="1" class="text-dark">inserimento chip</option>
                            <option value="1" class="text-dark">inserimento contactless</option>
                            <option value="1" class="text-dark">irrigidimento plastica</option>
                            <option value="1" class="text-dark">laminazione</option>
                            <option value="1" class="text-dark">posizionamento degli elaborati</option>
                            <option value="1" class="text-dark">separazione carte</option>
                            <option value="1" class="text-dark">stampa codice carta</option>
                            <option value="1" class="text-dark">stampaggio grafica</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Riga descrizione-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">descrizione:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <textarea class="form-control bg-transparent text-light" cols="40" rows="5"></textarea>
                    <!-- input type="text" class="form-control bg-transparent text-light input_field_descrizione" id="" name="" -->
                </div>
            </div>

            <!-- Riga semilavorato-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">semilavorato:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" class="form-control bg-transparent text-light" id="" name="" required>
                </div>
            </div>

            <!-- Riga segnalatore-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">segnalatore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" class="form-control bg-transparent text-light" id="" name="" required>
                </div>
            </div>

            <!-- Riga risolutore-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">risolutore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" class="form-control bg-transparent text-light" id="" name="" required>
                </div>
            </div>

            <!-- Riga verificatore-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">verificatore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" class="form-control bg-transparent text-light" id="" name="" required>
                </div>
            </div>

            <!-- Riga decisione -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">decisione:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <div class="input-group">
                        <select class="form-control text-uppercase bg-transparent text-light" id="" name="" required>
                            <!-- BACKEND conviene creare gli option con una quey alla tabella: processi -->
                            <option selected class="text-dark">opzione 1</option>
                            <option class="text-dark">opzione 2</option>
                            <option class="text-dark">opzione 3</option>
                            <option class="text-dark">opzione 4</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Riga azioni correttive-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">azioni correttive:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <textarea class="form-control bg-transparent text-light" cols="40" rows="5"></textarea>
                    <!-- input type="text" class="form-control bg-transparent text-light input_field_descrizione" id="" name="" -->
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