<?php
    define("TITLE", "Comma - Management");
    include "../assets/layouts/header.php";
    require_once "../assets/includes/data_functions.php";
    check_logged_in();
    check_licenziato();
    if(!isset($_SESSION['admin']))
        header("Location: ../");
?>

<!-- Non conformità -->
<section class="p-3 w-100 d-flex align-items-center justify-content-center">
    <span class="page_subtitle text-uppercase text-light">utenti</span>
</section>

<!-- search bar -->
<section class="p-5">
    <div class="container">
        <form class="row text-center" action="" method="POST">
            <div class="col-md-6 p-3 col-sm-12 input-group align-items-center justify-content-center">
                <!-- BACKEND: barra di ricerca per filtro sugli utenti -->
                <input type="text" class="form-control search_field" name="search_field" placeholder="Cerca un utente" />
                <button class="btn btn-primary search_button" type="submit" name="search_button" onclick="refresh()"><span><i class="bi bi-search"></span></i></button>
            </div>
            <div class="col-md-3 col-sm-6 p-3 text-md-right text-sm-center">
                <!-- BACKEND: tasto filtra -->
                <button class="btn btn-primary btn-lg text-uppercase" type="button" name="filter" id="">filtra</button>
            </div>
            <div class="col-md-3 col-sm-6 p-3 text-md-right text-sm-center">
                <!-- BACKEND: tasto ordina -->
                <select class="btn btn-primary btn-lg text-uppercase" name="order" id="">
                    <option value="numero" class="bg-light text-dark">matricola</option>
                    <option value="data" class="bg-light text-dark">nome</option>
                    <option value="stato" class="bg-light text-dark">cognome</option>
                    <option value="priorita" class="bg-light text-dark">tipo</option>
                    <option value="origine" class="bg-light text-dark">processo</option>
                </select>
            </div>
        </form>
        <div class="text-light text-uppercase">
            <?php
                if(isset($_SESSION['error'])) echo $_SESSION['error'];
                if(isset($_SESSION['error']['update'])) echo $_SESSION['error']['update'];
            ?>
        </div>
    </div>
</section>

<section class="p-1">
    <div class="container">
        <table class="table table-hover text-light text-uppercase">
            <thead>
                <!-- prima riga della tabella -->
                <tr>
                    <th scope="col">matricola</th>
                    <th scope="col">nome</th>
                    <th scope="col">cognome</th>
                    <th scope="col">tipo</th>
                    <th scope="col">processo</th>
                    <th scope="col">dettagli</th>
                </tr>
            </thead>
            <tbody>
                <?php include "./includes/management_include.php"; ?>
                <!-- BACKEND: da rivedere perché non corretto -->
            </tbody>
        </table>
    </div>
</section>

<section class="p-5">
    <div class="container d-flex justify-content-end">
        <a href="../insert_user/"><button class="btn btn-danger btn-lg text-uppercase" type="button" id="">inserisci utente</button></a>
    </div>
</section>

<?php
    include "../assets/layouts/footer.php";
?>