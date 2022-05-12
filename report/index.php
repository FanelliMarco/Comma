<?php
    define("TITLE", "Comma - Report");
    include "../assets/layouts/header.php";
    require "../assets/includes/data_functions.php";
    check_logged_in();
    check_licenziato();
?>

<!-- Non conformità -->
<section class="p-3 w-100 d-flex align-items-center justify-content-center">
    <span class="page_subtitle text-uppercase text-light d-none d-md-block">segnalazione di non conformità</span>
</section>


<!-- Form per compilazione -->
<section class="p-5">
    <div class="container">
        <form class="form-auth flex-column text-white" action="./includes/report_include.php" method="POST">
            <!-- BACKEND completare gli id di ogni tag input e del tag button di conferma-->
            <!-- nel campo for dei label copiare il corrispettivo id del campo input associato -->
            <div class="row g-3">
                <div class="col-lg-6 col-md-12 p-5">
                    <div class="form-group">
                        <label for="processo" class="h2 form-label mb-3 ml-3">Processo di origine</label>
                        <input type="text" class="form-control mb-3 form_control_font" id="processo" name='processo'>
                    </div>
                    <div class="form-group">
                        <label for="codice" class="h2 form-label mb-3 ml-3">
                            Codice
                            <select class="form-select bg-transparent text-light" name='fase'>
                                <option class="text-dark" value="Prodotto" selected>Prodotto</option>
                                <option class="text-dark" value="Semilavorato">Semilavorato</option>
                                <option class="text-dark" value="Altro">Materie Prime</option>
                            </select>
                            :
                        </label>
                        <input type="text" class="form-control mb-3 form_control_font" id="codice" name='codice_semicodice'>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 p-5">
                    <div class="form-group">
                        <label for="descrizione" class="h2 form-label mb-3 ml-3">Descrizione </label>
                        <input type="text" class="form-control mb-3 form_control_font form_control_descrizione" id="descrizione" name='descrizione'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-50 text-uppercase" id="sub" name='sub'><span class="form_control_font">conferma</span></button>
                </div>
            </div>
            <div>
                <?php if(isset($_SESSION['error'])) echo $_SESSION['error']; ?>
            </div>
        </form>
    </div>
</section>


<?php
    include "../assets/layouts/footer.php";
?>