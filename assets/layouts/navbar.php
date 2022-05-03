<?php if(isset($_SESSION['auth'])) ?>

 <!-- inizio navbar -->

 <nav class="navbar navbar-expand-lg bg-transparent navbar-dark py-3 fixed-top">
     <div class="container-fluid">
         <div class="col-1 h-100 d-flex align-items-center justify-content-center">
             <a href="../logout"><i class="bi bi-box-arrow-left"></i></a>
         </div>
         <div class="col-10 h-100">
             <div class="logo_image h-100 d-flex align-items-center justify-content-center">
                 <img class="d-none d-md-block" src="../assets/images/logo_intero_w.png" alt="" height="100px">
             </div>
         </div>
         <div class="col-1 h-100 d-flex align-items-center justify-content-center">
             <a href="#"><i class="bi bi-person"></i></a>
         </div>
     </div>
 </nav>

 <!-- fine navbar -->