 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="<?= base_url('dashboard') ?>" class="brand-link">
         <!-- <img src="<?= base_url() ?>public/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
         <center>
             <span class="brand-text font-weight-light text-center" style="text-align: center;"><strong>Wisata KAB. PANGKEP</strong></span>
         </center>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3  d-flex">
             <div class="image">
                 <img src="<?= base_url() ?>public/assets/dist/img/admin-icon.png" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block"><?= $this->session->userdata('nama_pengguna'); ?></a>
             </div>
         </div>


         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-header ">Administrator</li>
                 <li class="nav-item">
                     <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
                         <!-- <i class="nav-icon fas fa-th-large"></i> -->
                         <svg width="17px" height="17px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                             <title>dashboard</title>
                             <desc>Created with Sketch.</desc>
                             <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <g id="Rounded" transform="translate(-341.000000, -245.000000)">
                                     <g id="Action" transform="translate(100.000000, 100.000000)">
                                         <g id="-Round-/-Action-/-dashboard" transform="translate(238.000000, 142.000000)">
                                             <g>
                                                 <polygon id="Path" points="0 0 24 0 24 24 0 24"></polygon>
                                                 <path d="M4,13 L10,13 C10.55,13 11,12.55 11,12 L11,4 C11,3.45 10.55,3 10,3 L4,3 C3.45,3 3,3.45 3,4 L3,12 C3,12.55 3.45,13 4,13 Z M4,21 L10,21 C10.55,21 11,20.55 11,20 L11,16 C11,15.45 10.55,15 10,15 L4,15 C3.45,15 3,15.45 3,16 L3,20 C3,20.55 3.45,21 4,21 Z M14,21 L20,21 C20.55,21 21,20.55 21,20 L21,12 C21,11.45 20.55,11 20,11 L14,11 C13.45,11 13,11.45 13,12 L13,20 C13,20.55 13.45,21 14,21 Z M13,4 L13,8 C13,8.55 13.45,9 14,9 L20,9 C20.55,9 21,8.55 21,8 L21,4 C21,3.45 20.55,3 20,3 L14,3 C13.45,3 13,3.45 13,4 Z" id="🔹Icon-Color" fill="#ffffff"></path>
                                             </g>
                                         </g>
                                     </g>
                                 </g>
                             </g>
                         </svg>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="<?= base_url('kategori') ?>" class="nav-link <?= $this->uri->segment(1) == 'kategori' ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-list-alt"></i>
                         <p>
                             Kategori
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="<?= base_url('wisata') ?>" class="nav-link <?= $this->uri->segment(1) == 'wisata' ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-vihara"></i>
                         <p>
                             Wisata
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="<?= base_url('pengumuman') ?>" class="nav-link <?= $this->uri->segment(1) == 'pengumuman' ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-newspaper"></i>
                         <p>
                             Pengumuman
                         </p>
                     </a>
                 </li>


                 <li class="nav-item">
                     <a href="<?= base_url('reviews') ?>" class="nav-link <?= $this->uri->segment(1) == 'reviews' ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-comments"></i>
                         <p>
                             Reviews
                         </p>
                     </a>
                 </li>

                 <li class="nav-header ">Utility</li>
                 <li class="nav-item">
                     <a href="<?= base_url('info-apps') ?>" class="nav-link <?= $this->uri->segment(1) == 'info-apps' ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-info-circle"></i>
                         <p>
                             Info Apps
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('logout') ?>" class="nav-link">
                         <i class="nav-icon fas fa-power-off"></i>
                         <p>
                             Logout
                         </p>
                     </a>
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>