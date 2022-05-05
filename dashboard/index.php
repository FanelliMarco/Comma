<?php
    define("TITLE", "Comma - Management");
    include "../assets/layouts/header.php";
    require_once "../assets/includes/data_functions.php";
?>

<!-- Non conformità -->
<section class="p-3 w-100 d-flex align-items-center justify-content-center">
    <span class="page_subtitle text-uppercase text-light">non conformità</span>
</section>

<!-- search bar -->
<section class="p-5">
    <div class="container">
        <form class="row text-center" action="./includes/management_include.php" method="POST">
            <div class="col-md-6 p-3 col-sm-12 input-group align-items-center justify-content-center">
                <!-- BACKEND: barra di ricerca per filtro sulle non conformità -->
                <input type="text" class="form-control" name="search_field" placeholder="Cerca una non conformità" />
                <button class="btn btn-primary" type="submit" name="search_button" onclick="refresh()"><span><i class="bi bi-search"></span></i></button>
            </div>
            <div class="col-md-3 col-sm-6 p-3 text-md-right text-sm-center">
                <!-- BACKEND: tasto filtra -->
                <button class="btn btn-primary btn-lg text-uppercase" type="button" name="filter" id="">filtra</button>
            </div>
            <div class="col-md-3 col-sm-6 p-3 text-md-right text-sm-center">
                <!-- BACKEND: tasto ordina -->
                <select class="btn btn-primary btn-lg text-uppercase" name="order" id="">
                    <option value="numero">NUMERO</option>
                    <option value="data">DATA</option>
                    <option value="stato">STATO</option>
                    <option value="priorita">PRIORITA</option>
                    <option value="origine">ORIGINE</option>
                </select>
            </div>
            <div>
                <?php if (isset($_SESSION['error'])) echo $_SESSION['error']; ?>
            </div>

            <!-- DROPFUCKINGDOWN -->
            <div class="dropdown dropleft">
                    <a class="btn btn-transparent dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- BACKEND : togliere il link alla pagina corrente -->
                        <?php 
                            if(isset($_SESSION['admin'])){
                                echo "<li><a class='dropdown-item text-uppercase' href='../management/index.php'><span>management</span></a></li>";}
                        ?>
                        <li><a class="dropdown-item text-uppercase" href="../dashboard/index.php"><span>Dashboard</span></a></li>
                        <li><a class="dropdown-item text-uppercase" href="../edit/index.php"><span>edit</span></a></li>
                        <li><a class="dropdown-item text-uppercase" href="../recover/index.php"><span>recover</span></a></li>
                        <li><a class="dropdown-item text-uppercase" href="../report/index.php"><span>report</span></a></li>
                    </ul>
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
                <?php fill_NC_table($_SESSION['matricola']); ?> <!-- BACKEND: da rivedere perché non corretto -->
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
