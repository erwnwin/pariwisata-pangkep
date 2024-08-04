         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Create Kategori Wisata</h1>
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
                                     <h3 class="card-title">Form Create Kategori Wisata</h3>

                                     <div class="card-tools">
                                         <a href="<?= base_url('kategori') ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>
                                     </div>
                                 </div>
                                 <div class="card-body p-0">
                                     <form class="form-horizontal" id="formKategori" method="post" action="<?php echo base_url('kategori/store'); ?>" enctype="multipart/form-data">
                                         <div class="card-body">
                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Kategori</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" placeholder="Nama Kategori" autocomplete="off" required>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">File Gambar</label>
                                                 <div class="col-sm-9">
                                                     <input type="file" name="gambar_kategori" class="form-control" id="gambar_kategori" accept="image/*" required>
                                                     <div id="imagePreviewContainer" style="display: none;">
                                                         <img src="#" id="imagePreview" class="preview-image">
                                                         <br>
                                                         <span id="removeImage" class="remove-image btn-sm btn-danger">Remove Image</span>
                                                     </div>
                                                 </div>
                                             </div>

                                         </div>
                                         <!-- /.card-body -->
                                         <div class="card-footer">
                                             <!-- <button type="submit" class="btn btn-info">Sign in</button> -->
                                             <button type="submit" class="btn btn-primaryku btn-sm float-right">
                                                 <span id="btnLoader" style="display: none;">
                                                     <i class="fa fa-spinner fa-spin"></i>
                                                 </span>
                                                 Simpan
                                             </button>
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