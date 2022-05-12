<?php
define("TITLE", "Comma - Edit User");
include "../assets/layouts/header.php";
require "../assets/includes/data_functions.php";
check_logged_in();
if(!isset($_SESSION['admin']))
        header("Location: ../");

$user = db_get_impiegato_spec($_GET["matricola"]);

?>

<!-- Non conformità -->
<section class="p-3 pb-5 w-100 d-flex align-items-center justify-content-center">
    <span class="page_subtitle text-uppercase text-light">modifica impiegato</span>
</section>

<!-- Form container -->
<section>
    <div class="container mt-5">
        <form class="h4 text-light text-align-start text-uppercase" action="./includes/edit_user_include.php" method="post">
            <!-- Per ogni riga -->
            <!-- Riga matricola -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">matricola:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type="text" value="<?php echo $_GET["matricola"] ?>" class="form-control bg-transparent text-light" id="matricola" name="matricola" readonly>
                </div>
            </div>

            <!-- Riga nome -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3 text-uppercase"><span class="">nome:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input type='text' value="<?php echo $user[0]['Nome'] ?>" class="form-control bg-transparent text-light" id="nome" name="nome" readonly>
                </div>
            </div>

            <!-- Riga cognome -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">cognome:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input id="cognome" name="cognome" type="text" value="<?php echo $user[0]['Cognome'] ?>" class="form-control bg-transparent text-light" readonly>
                </div>
            </div>

            <!-- Riga username -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">username:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input id="username" name="username" type="text" value="<?php echo $user[0]['Username'] ?>" class="form-control bg-transparent text-light">
                </div>
            </div>

            <!-- Riga password -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">password:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input id="password" name="password" type="text" class="form-control bg-transparent text-light">
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
                            <option <?php if ($user[0]["Tipo"] == "operaio") echo "selected" ?> value='Operaio' class="text-dark">Operaio</option>
                            <option <?php if ($user[0]["Tipo"] == "addetto al controllo qualità") echo "selected" ?> value="Addetto al controllo qualità" class="text-dark">Addetto al controllo qualità</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Riga processo-->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">processo:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <div class="input-group">
                        <select class="form-control text-uppercase bg-transparent text-light" id="processo" name="processo" >
                            <?php

                            $processi = db_get_processi();

                            foreach ($processi as $processo) {

                                echo "<option value='" . $processo["Nome"] . "' ";
                                if ($user[0]["Processo"] == $processo) echo "selected ";
                                echo "class='text-dark'>" . $processo["Nome"] . " (processo)</option>";
                            }

                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Riga created_at -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">creato il giorno:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input id="created_at" name="created_at" type="date" value="<?php echo $user[0]["created_at"] ?>" class="form-control bg-transparent text-light">
                </div>
            </div>

            <!-- Riga data -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">ultimo aggiornamento:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input id="updated_at" name="updated_at" type="date" value="<?php echo $user[0]["updated_at"] ?>" class="form-control bg-transparent text-light">
                </div>
            </div>

            <!-- Riga data -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">cancellato il giorno:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input id="deleted_at" name="deleted_at" type="date" value="<?php echo $user[0]["deleted_at"] ?>" class="form-control bg-transparent text-light">
                </div>
            </div>

            <!-- Riga data -->
            <div class="row align-items-center justify-content-center pb-5">
                <!-- Colonna di sinistra -->
                <div class="col-3"><span class="">ultimo accesso il giorno:</span></div>
                <!-- Colonna di destra -->
                <div class="col-9">
                    <input id="last_login_at" name="last_login_at" type="date" value="<?php echo $user[0]["last_login_at"] ?>" class="form-control bg-transparent text-light">
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