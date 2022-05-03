<?php
define("TITLE", "Comma - Login");
include "../assets/layouts/header.php";
include "./includes/management_include.php";
?>

<!-- Non conformità -->
<section class="p-3 w-100 d-flex align-items-center justify-content-center">
    <span class="page_subtitle text-uppercase text-light">non conformità</span>
</section>

<!-- search bar -->
<section class="p-5">
    <div class="container">
        <form class="row text-center" action="./includes/management_include.php" method="post">
            <div class="col-md-6 p-3 col-sm-12 input-group align-items-center justify-content-center">
                <!-- BACKEND: barra di ricerca per filtro sulle non conformità -->
                <input type="text" class="form-control" name="search_field" placeholder="Cerca una non conformità" />
                <button class="btn btn-primary" type="button" name="search_button" onclick="refresh()"><span><i class="bi bi-search"></span></i></button>
            </div>
            <div class="col-md-3 col-sm-6 p-3 align-items-center justify-content-center">
                <!-- BACKEND: tasto filtra -->
                <button class="btn btn-primary btn-lg text-uppercase" type="button" id="">filtra</button>
            </div>
            <div class="col-md-3 col-sm-6 p-3 text-center">
                <!-- BACKEND: tasto ordina -->
                <button class="btn btn-primary btn-lg text-uppercase" type="button" id="">ordina</button>
            </div>
        </form>
    </div>
</section>

<section class="p-1">
    <div class="container">
        <table class="table table-hover text-light text-uppercase">
            <thead>
                <!-- prima riga della tabella -->
                <tr>
                    <th scope="col">numero</th>
                    <th scope="col">data</th>
                    <th scope="col">stato</th>
                    <th scope="col">priorità</th>
                    <th scope="col">origine</th>
                </tr>
            </thead>
            <tbody>
                <?php fill_NC_table(); ?> <!-- BACKEND: da rivedere perché non corretto -->
            </tbody>
        </table>
    </div>
</section>


<section class="p-5">
    <div class="container d-flex justify-content-end">
        <a href="../report/index.php"><button class="btn btn-danger btn-lg text-uppercase" type="button" id="">segnala non conformità</button></a>
    </div>
</section>


<?php
include "../assets/layouts/footer.php";
?>