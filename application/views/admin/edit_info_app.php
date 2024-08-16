         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Update Info Aplikasi</h1>
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
                                     <h3 class="card-title">Edit Info Aplikasi</h3>


                                 </div>
                                 <div class="card-body p-0">
                                     <form class="form-horizontal" id="formEditInfoApp" method="post">
                                         <div class="card-body">
                                             <table class="table">
                                                 <tbody>
                                                     <tr>
                                                         <th class="text-right" style="width: 30%;">Nama Aplikasi</th>
                                                         <td>
                                                             <input type="hidden" class="form-control" name="id" id="id" value="<?php echo trim($info['id']); ?>" autocomplete="off" required>
                                                             <input type="text" class="form-control" name="nama_aplikasi" id="nama_aplikasi" value="<?php echo trim($info['nama_aplikasi']); ?>" autocomplete="off" required>
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                         <th class="text-right" style="width: 30%;">Bahasa Pemrograman</th>
                                                         <td>
                                                             <input type="text" class="form-control" name="bhs_code" id="bhs_code" value="<?php echo trim($info['bhs_code']); ?>" autocomplete="off" required>
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                         <th class="text-right" style="width: 25%;">Versi Aplikasi</th>
                                                         <td>
                                                             <input type="text" class="form-control" name="versi_app" id="versi_app" value="<?php echo trim($info['versi_app']); ?>" autocomplete="off" required>
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                         <th class="text-right" style="width: 30%;">Tentang Aplikasi</th>
                                                         <td>
                                                             <textarea name="tentang_app" class="form-control" cols="10" rows="12" id="tentang_app" placeholder="Tentang app"><?php echo trim($info['tentang_app']); ?></textarea>
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                         <th class="text-right" style="width: 30%;">Kontak Kami</th>
                                                         <td>
                                                             <input type="text" class="form-control" name="hub_kami" id="hub_kami" value="<?php echo trim($info['hub_kami']); ?>" autocomplete="off" required>
                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
                                         </div>
                                         <div class="card-footer">
                                             <button type="submit" class="btn btn-primaryku btn-sm">
                                                 <span id="btnLoader" style="display: none;">
                                                     <i class="fa fa-spinner fa-spin"></i>
                                                 </span>
                                                 Update
                                             </button>
                                             <a href="<?= base_url('info-apps') ?>" class="btn btn-sm btn-outline-danger float-right">Back</a>
                                         </div>
                                     </form>


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