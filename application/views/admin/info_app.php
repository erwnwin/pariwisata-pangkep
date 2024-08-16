         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Info Aplikasi</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">

                     <div class="row">
                         <div class="col-lg-2">

                         </div>
                         <!-- ./col -->

                         <div class="col-lg-8 col-12">
                             <!-- Default box -->
                             <div class="card">
                                 <div class="card-header">
                                     <h3 class="card-title">Info Aplikasi</h3>


                                 </div>
                                 <div class="card-body p-0">
                                     <form class="form-horizontal" id="formEditKategori" method="post" action="<?php echo base_url('kategori/update'); ?>" enctype="multipart/form-data">
                                         <div class="card-body">
                                             <table class="table">
                                                 <tbody>
                                                     <tr>
                                                         <th class="text-right" style="width: 30%;">Nama Aplikasi</th>
                                                         <td>
                                                             <?php echo $info['nama_aplikasi']; ?>

                                                         </td>
                                                     </tr>
                                                     <tr>
                                                         <th class="text-right" style="width: 30%;">Bahasa Pemrograman</th>
                                                         <td>
                                                             <?php echo $info['bhs_code']; ?>
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                         <th class="text-right" style="width: 25%;">Versi Aplikasi</th>
                                                         <td>
                                                             <?php echo $info['versi_app']; ?>

                                                         </td>
                                                     </tr>
                                                     <tr>
                                                         <th class="text-right" style="width: 30%;">Tentang Aplikasi</th>
                                                         <td>
                                                             <?php echo $info['tentang_app']; ?>

                                                         </td>
                                                     </tr>
                                                     <tr>
                                                         <th class="text-right" style="width: 30%;">Kontak Kami</th>
                                                         <td>
                                                             <?php echo $info['hub_kami']; ?>

                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>


                                         </div>
                                         <!-- /.card-body -->
                                         <div class="card-footer">
                                             <a href="<?= base_url('info-apps/edit') ?>" class="btn btn-sm btn-primaryku float-right">Edit</a>
                                             <!-- <button type="submit" class="btn btn-info">Sign in</button> -->
                                             <!-- <button type="submit" class="btn btn-primaryku btn-sm float-right">
                                                 <span id="btnLoader" style="display: none;">
                                                     <i class="fa fa-spinner fa-spin"></i>
                                                 </span>
                                                 Update
                                             </button> -->
                                         </div>
                                         <!-- /.card-footer -->
                                     </form>
                                     <!-- <div class="overlay hide">
                                         <i class="fas fa-spinner"></i>
                                     </div> -->
                                 </div>
                             </div>
                         </div>
                         <!-- ./col -->

                         <div class="col-lg-2">

                         </div>
                         <!-- ./col -->
                     </div>
                 </div>


             </section>

             <div>
                 <br>
             </div>

         </div>