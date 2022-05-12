<?php
define("TITLE", "Comma - Edit");
include "../assets/layouts/header.php";
require "../assets/includes/data_functions.php";
check_logged_in();
check_licenziato();
$nc = db_get_nc($_GET["numero"], $_GET["tipo"]);

?>

<!-- Non conformità -->
<section class="p-3 pb-5 w-100 d-flex align-items-center justify-content-center">
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
                    <input type="text" value="<?php echo $_GET["numero"] ?>" class="form-control bg-transparent text-light" id="n_nc" name="numero" readonly>
                </div>
            </div>

            <!-- Riga tipo -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">tipo:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type='text' value="<?php echo $_GET["tipo"] ?>" class="form-control bg-transparent text-light" id="tipo" name="tipo" readonly>
                </div>
            </div>

            <!-- Riga data -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">data:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input id="date" name="date" type="date" value="<?php echo $nc[0]["data"] ?>" class="form-control bg-transparent text-light">
                </div>
            </div>

            <!-- Riga stato-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">stato:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <div class="input-group">
                        <select class="form-control text-uppercase bg-transparent text-light" id="stato" name="stato" >
                            <option <?php if ($nc[0]["stato"] == "rilevata") echo "selected" ?> class="text-dark">rilevata</option>
                            <option <?php if ($nc[0]["stato"] == "in gestione") echo "selected" ?> value="rilevata" class="text-dark">in gestione</option>
                            <option <?php if ($nc[0]["stato"] == "assegnata") echo "selected" ?> value="assegnaa" class="text-dark">assegnata</option>
                            <option <?php if ($nc[0]["stato"] == "in risoluzione") echo "selected" ?> value="in_risoluzione" class="text-dark">in risoluzione</option>
                            <option <?php if ($nc[0]["stato"] == "risolta") echo "selected" ?> value="risolta" class="text-dark">risolta</option>
                            <option <?php if ($nc[0]["stato"] == "da verificare") echo "selected" ?> value="da_verificare" class="text-dark">da verificare</option>
                            <option <?php if ($nc[0]["stato"] == "non verificata") echo "selected" ?> value="non_verificata" class="text-dark">non verificata</option>
                            <option <?php if ($nc[0]["stato"] == "in verifica") echo "selected" ?> value="in_verifica" class="text-dark">in verifica</option>
                            <option <?php if ($nc[0]["stato"] == "verificata") echo "selected" ?> value="verificata" class="text-dark">verificata</option>
                            <option <?php if ($nc[0]["stato"] == "conclusa") echo "selected" ?> value="conclusa" class="text-dark">conclusa</option>
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
                        <select class="form-control text-uppercase bg-transparent text-light" id="priorita" name="priorita" >
                            <option <?php if ($nc[0]["priorita"] == "bassa") echo "selected" ?> valuie="bassa" class="text-dark">bassa</option>
                            <option <?php if ($nc[0]["priorita"] == "media") echo "selected" ?> value="media" class="text-dark">media</option>
                            <option <?php if ($nc[0]["priorita"] == "alta") echo "selected" ?> value="alta" class="text-dark">alta</option>
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
                        <select class="form-control text-uppercase bg-transparent text-light" id="origine" name="origine" >
                            <?php

                            $processi = db_get_processi();
                            $fornitori = db_get_fornitori();

                            foreach ($processi as $processo) {

                                echo "<option value='" . $processo["Nome"] . "' ";
                                if ($nc[0]["origine"] == $processo) echo "selected ";
                                echo "class='text-dark'>" . $processo["Nome"] . " (processo)</option>";
                            }

                            foreach ($fornitori as $fornitore) {

                                echo "<option value='" . $fornitore["Nome"] . "' ";
                                if ($nc[0]["origine"] == $fornitore) echo "selected ";
                                echo "class='text-dark'>" . $fornitore["Nome"] . " (fornitore)</option>";
                            }

                            ?>
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
                    <textarea <?php if (isset($nc[0]["descrizione"])) echo "value='" . $nc[0]["descrizione"] . "'" ?> class="form-control bg-transparent text-light" cols="40" rows="5" id="descrizione" name="descrizione"></textarea>
                    <!-- input type="text" class="form-control bg-transparent text-light input_field_descrizione" id="" name="" -->
                </div>
            </div>

            <!-- Riga oggetto-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">oggetto:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input value="<?php echo $nc[0]["oggetto"] ?>" type="text" class="form-control bg-transparent text-light" id="oggetto" name="oggetto" >
                </div>
            </div>

            <!-- Riga segnalatore-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">segnalatore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input value="<?php echo $nc[0]["segnalatore"] ?>" type="text" class="form-control bg-transparent text-light" id="segnalatore" name="segnalatore" readonly>
                </div>
            </div>

            <!-- Riga risolutore-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">risolutore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input <?php if (isset($nc[0]["risolutore"])) echo "value='" . $nc[0]["risolutore"] . "'" ?> type="text" class="form-control bg-transparent text-light" id="risolutore" name="risolutore" >
                </div>
            </div>

            <!-- Riga verificatore-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">verificatore:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input <?php if (isset($nc[0]["verificatore"])) echo "value='" . $nc[0]["verificatore"] . "'" ?> type="text" class="form-control bg-transparent text-light" id="verificatore" name="verificatore" >
                </div>
            </div>

            <!-- Riga decisione -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">decisioni:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <div class="input-group">
                        <select class="form-control text-uppercase bg-transparent text-light" id="decisioni" name="decisioni" >
                            <option <?php if($nc[0]["decisioni"] == "semilavorato scartato") echo "selected" ?> value="semilavorato scartato" class="text-dark">semilavorato scartato</option>
                            <option <?php if($nc[0]["decisioni"] == "rilavorazione") echo "selected" ?> value="rilavorazione" class="text-dark">rilavorazione</option>
                            <option <?php if($nc[0]["decisioni"] == "opzione 3") echo "selected" ?> value="opzione 3" class="text-dark">opzione 3</option>
                            <option <?php if($nc[0]["decisioni"] == "opzione 4") echo "selected" ?> value="opzione 4" class="text-dark">opzione 4</option>
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
                    <textarea <?php if (isset($nc[0]["az_corr"])) echo "value='" . $nc[0]["az_corr"] . "'" ?> class="form-control bg-transparent text-light" cols="40" rows="5" id="az_corr" name="az_corr"></textarea>
                    <!-- input type="text" class="form-control bg-transparent text-light input_field_descrizione" id="" name="" -->
                </div>
            </div>

            <!-- conferma edit -->
            <section class="p-5">
                <div class="row">
                    <div class="col form-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-25 text-uppercase" id="invio" name='invio'>
                            <span class="form_control_font">conferma</span>
                        </button>
                    </div>
                </div>
            </section>
        </form>
    </div>
    <div>
        <?php
            if(isset($_SESSION["error"])) echo $_SESSION["error"];
        ?>
    </div>
</section>



<?php
include "../assets/layouts/footer.php";
?>