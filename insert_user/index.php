<?php
define("TITLE", "Comma - Insert User");
include "../assets/layouts/header.php";
require "../assets/includes/data_functions.php";
check_logged_in();
if(!isset($_SESSION['admin']))
    header("Location: ../");
?>

<!-- Non conformità -->
<section class="p-3 w-100 d-flex align-items-center justify-content-center">
    <span class="page_subtitle text-uppercase text-light d-none d-md-block">gestione profili aziendali</span>
</section>


<!-- Form per compilazione -->
<section class="p-5">
    <div class="container">
        <form class="form-auth flex-column text-white" action="./includes/insert_user_include.php" method="POST">
            <!-- BACKEND completare gli id di ogni tag input e del tag button di conferma-->
            <!-- nel campo for dei label copiare il corrispettivo id del campo input associato -->
            <!-- contenuti del form -->

            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">matricola:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" class="form-control bg-transparent text-light" id="matricola" name="matricola">
                </div>
            </div>

            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">nome:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" class="form-control bg-transparent text-light" id="nome" name="nome">
                </div>
            </div>

            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">cognome:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" class="form-control bg-transparent text-light" id="cognome" name="cognome">
                </div>
            </div>

            <!-- Riga tipo-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">tipo:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <div class="input-group">
                        <select class="form-control text-uppercase bg-transparent text-light" id="tipo" name="tipo" >
                            <option value='Operaio' class="text-dark">Operaio</option>
                            <option value="Addetto al controllo qualita" class="text-dark">Addetto al controllo qualità</option>
                        </select>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script>
                $(document).ready(function(){
                    $('#tipo').change(function(){
                        if(($(this).val() === 'Operaio')){
                            $('.processo').show();
                        }
                        else{
                            $('.processo').hide();
                        }
                    }).change();
                });
            </script>
            
            <!-- Riga processo-->
            <div class="processo row align-items-center justify-content-center pb-5" style='display:none;' id="processo">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">processo:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <div class="input-group">
                        <select class="form-control text-uppercase bg-transparent text-light" id="" name="processo" >
                            <?php

                            $processi = db_get_processi();

                            foreach ($processi as $processo) {

                                echo "<option value='" . $processo["Nome"] . "' ";
                                echo "class='text-dark'>" . $processo["Nome"] . "</option>";

                            }

                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- bottone conferma -->
            <section>
                <div class="row">
                    <div class="col form-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-50 text-uppercase" id="sub" name='sub'><span class="form_control_font">conferma</span></button>
                    </div>
                </div>
            </section>

            <div>
                <?php if (isset($_SESSION['error'])) echo $_SESSION['error']; ?>
            </div>
        </form>
    </div>
</section>


<?php
include "../assets/layouts/footer.php";
?>