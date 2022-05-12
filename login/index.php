<?php
    define("TITLE", "Comma - Login");
    include "../assets/layouts/header.php";
    check_logged_out();
?>

<div class="row h-100">
    <!--- Left Column --->
    <div class="col-lg-6 col-md-12" id="left_col">
        <div class="position-absolute logo_image">
            <img src="../assets/images/logo_intero_w.png" alt="" height="100px">
        </div>
        <div class="position-absolute login_welcome">
            <span class="text-uppercase text-light">benvenuti in comma</span>
        </div>
    </div>
    <!-- Right Column -->
    <div class="row col-lg-6 col-md-12" id="right_col">
        <div class="col-2" id="">
            <!-- Spazio vuoto form a sinistra -->
        </div>
        <div class="col-8" id="">
            <div class="position-absolute login_title">
                <span class="text-uppercase text-light d-none d-md-block">log-in</span>
            </div>
            <form class="form-auth flex-column text-white position-absolute form_login" action="./includes/login_include.php" method="POST">
                <!-- BACKEND completare gli id di ogni tag input e del tag button del submit-->
                <!-- nel campo for di ogni label copiare il corrispettivo id dell'input associato -->
                <div class="form-group">
                    <label for="user" class="h2 form-label mb-3 ml-3">User</label>
                    <input type="text" class="form-control mb-3 form_control_font" id="user" name='user'>
                </div>
                <div class="form-group">
                    <label for="pw" class="h2 form-label mb-3 ml-3">Password</label>
                    <input type="password" class="form-control mb-3 form_control_font" id="pw" name='pw'>
                </div>
                <div>
                    <?php if(isset($_SESSION['error'])) echo $_SESSION['error'];?>
                </div>
                <div class="form-group w-100 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-100 text-uppercase" id="sub" name='sub'><span class="form_control_font">conferma</span></button>
                </div>
            </form>
        </div>
        <div class="col-2" id="">
            <!-- Spazio vuoto form a destra -->
        </div>
    </div>
</div>

<?php
    include "../assets/layouts/footer.php";
?>