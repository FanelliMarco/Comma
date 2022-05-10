<?php
define("TITLE", "Comma - Insert User");
include "../assets/layouts/header.php";
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
        <form class="form-auth flex-column text-white" action="./includes/edit_user_include.php" method="POST">
            <!-- BACKEND completare gli id di ogni tag input e del tag button di conferma-->
            <!-- nel campo for dei label copiare il corrispettivo id del campo input associato -->
            <!-- contenuti del form -->
            <div class="row g-3">
                <div class="col-lg-6 col-md-12 p-5">
                    <div class="form-group">
                        <label for="processo" class="h2 form-label mb-3 ml-3">Utente</label>
                        <input type="text" class="form-control mb-3 form_control_font" id="Utente" name='Utente'>
                    </div>
                    <div class="form-group">
                        <label for="codice" class="h2 form-label mb-3 ml-3">Permessi</label>
                        <input type="text" class="form-control mb-3 form_control_font" id="Permessi" name='Permessi'>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 p-5">
                    <div class="form-group">
                        <label for="descrizione" class="h2 form-label mb-3 ml-3">Note</label>
                        <textarea class="form-control mb-3 text-dark form_control_descrizione" cols="40" rows="5" id="note" name='note'></textarea>
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