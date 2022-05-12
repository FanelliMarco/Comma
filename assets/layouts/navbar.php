<?php
if (isset($_SESSION['logged'])) { ?>
    <!-- inizio navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark py-3 fixed-top" style="background-color: #03173A;">
        <div class="container-fluid">

            <div class="col-1 h-100 d-flex align-items-center justify-content-center">
                <a href="../logout/index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                    </svg>
                </a>
            </div>

            <div class="col-10 h-100">
                <div class="logo_image h-100 d-flex align-items-center justify-content-center">
                    <img class="d-none d-md-block" src="../assets/images/logo_intero_w.png" alt="" height="100px">
                </div>
            </div>

            <div class="col-1 h-100 d-flex align-items-center justify-content-center">
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
                                echo "<li><a class='dropdown-item text-uppercase' href='../management/'><span>management</span></a></li>";}
                        ?>
                        <li><a class="dropdown-item text-uppercase" href="../dashboard/"><span>Dashboard</span></a></li>
                        <li><a class="dropdown-item text-uppercase" href="../report/"><span>report</span></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>
    <!-- fine navbar -->
<?php } ?>