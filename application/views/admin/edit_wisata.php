         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Update Wisata</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">

                     <div class="row">
                         <div class="col-lg-1">

                         </div>
                         <!-- ./col -->

                         <div class="col-lg-10 col-12">
                             <!-- Default box -->
                             <div class="card">
                                 <div class="card-header">
                                     <h3 class="card-title">Form Update Wisata</h3>

                                     <div class="card-tools">
                                         <a class="btn btn-sm btn-primaryku" data-toggle="modal" data-target="#modalMaps"><i class="fa fa-map"></i> Update Location</a>
                                         <a href="<?= base_url('wisata') ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>
                                     </div>
                                 </div>
                                 <div class="card-body p-0">
                                     <form class="form-horizontal" id="wisataEditForm" method="post" enctype="multipart/form-data">
                                         <div class="card-body">
                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Wisata</label>
                                                 <div class="col-sm-9">
                                                     <input type="hidden" name="id" class="form-control" id="id" value="<?= $wisata->id ?>" autocomplete="off" required>
                                                     <input type="text" name="nama_wisata" class="form-control" id="nama_wisata" value="<?= $wisata->nama_wisata ?>" placeholder="Nama Wisata" autocomplete="off" required>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Kategori Wisata</label>
                                                 <div class="col-sm-9">
                                                     <select name="kategori_id" id="kategori_id" class="form-control" required>
                                                         <option value="">Pilih Kategori</option>
                                                         <?php foreach ($kategori as $k) { ?>
                                                             <option value="<?= $k['id'] ?>" <?= ($k['id'] == $wisata->kategori_id) ? 'selected' : '' ?>>
                                                                 <?= $k['nama_kategori'] ?>
                                                             </option>
                                                         <?php } ?>
                                                     </select>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputPassword3" class="col-sm-3 col-form-label">Latitude</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" name="latitude" class="form-control" id="latitude" value="<?= $wisata->latitude ?>" autocomplete="off" placeholder="Klik tombol get location" readonly>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputPassword3" class="col-sm-3 col-form-label">Longitude</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" name="longitude" class="form-control" id="longitude" value="<?= $wisata->longitude ?>" autocomplete="off" placeholder="Klik tombol get location" readonly>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat</label>
                                                 <div class="col-sm-9">
                                                     <textarea name="alamat_lengkap" id="alamat_lengkap" cols="2" rows="4" class="form-control" placeholder="Alamat Lengkap" required><?= $wisata->alamat_lengkap ?></textarea>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Deskripsi </label>
                                                 <div class="col-sm-9">
                                                     <textarea name="deskripsi" id="deskripsi" cols="2" rows="10" class="form-control" placeholder="Deskripsi wisata" required><?= $wisata->deskripsi ?></textarea>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Pilih Beberapa Gambar Fasilitas</label>
                                                 <div class="col-sm-9">
                                                     <input type="file" name="gambar_fasilitas[]" class="form-control" id="gambar_fasilitas" multiple accept="image/*">
                                                     <span class="text-small text-danger" style="font-size: 12px;">*Dapat upload beberapa file. Maks size 5 MB</span>
                                                     <div class="preview-container" id="previewContainerFasilitas"></div>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Pilih Beberapa Gambar Kondisi Jalan</label>
                                                 <div class="col-sm-9">
                                                     <input type="file" name="gambar_kondisi_jalan[]" class="form-control" id="gambar_kondisi_jalan" multiple accept="image/*">
                                                     <span class="text-small text-danger" style="font-size: 12px;">*Dapat upload beberapa file. Maks size 5 MB</span>
                                                     <div class="preview-container" id="previewContainerJalan"></div>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Pilih Beberapa Gambar</label>
                                                 <div class="col-sm-9">
                                                     <input type="file" name="gambar_detail[]" class="form-control" id="gambar_detail" multiple accept="image/*">
                                                     <span class="text-small text-danger" style="font-size: 12px;">*Dapat upload beberapa file. Maks size 5 MB</span>
                                                     <div class="preview-container" id="previewContainer"></div>
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
                                                 Update
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

                         <div class="col-lg-1">

                         </div>
                         <!-- ./col -->
                     </div>
                 </div>


             </section>

             <div>
                 <br>
             </div>

         </div>

         <!-- maps -->
         <div class="modal fade" id="modalMaps" tabindex="-1" role="dialog" aria-labelledby="modalMapsLabel" aria-hidden="true">
             <div class="modal-dialog modal-lg" role="document"> <!-- Modal besar (modal-lg) -->
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="modalMapsLabel">Drag Marker Untuk Mendapatkan Lat dan Long</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <div id="map" style="width: 100%; height: 400px;"></div> <!-- Ukuran peta -->
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                         <!-- Tombol Simpan jika diperlukan -->
                     </div>
                 </div>
             </div>
         </div>