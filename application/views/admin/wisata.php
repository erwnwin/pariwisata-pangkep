         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Data Wisata</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">


                     <div class="card card-default">
                         <div class="card-header">
                             <h3 class="card-title">Daftar Wisata Kab. Pangkep</h3>
                             <div class="card-tools">
                                 <a href="<?= base_url('wisata/create') ?>" class="btn btn-sm btn-primaryku"><i class="fa fa-plus-circle"></i> Create</a>
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px">#</th>
                                             <th>Nama Wisata</th>
                                             <th>Alamat</th>
                                             <th>Kategori</th>
                                             <th>Isi / Deskripsi</th>
                                             <th style="width: 130px">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if (!empty($wisata)) { ?>
                                             <?php $no = 1;
                                                foreach ($wisata as $r) { ?>
                                                 <tr>
                                                     <td><?= $no++; ?></td>
                                                     <td><?php echo $r['nama_wisata']; ?></td>
                                                     <td><?php echo $r['alamat_lengkap']; ?></td>
                                                     <td><?php echo $r['nama_kategori']; ?></td>
                                                     <td><?php echo substr($r['deskripsi'], 0, 100); ?>.... <a href="">Selengkapnya</a></td>

                                                     <td>
                                                         <a href="<?= base_url('wisata/' . $r['encrypted_id'] . '/edit') ?>" class="btn btn-sm btn-outline-warning"> Edit </a>
                                                         <button type="button" class="btn btn-sm btn-outline-danger delete-btn" data-id="<?php echo $r['wisata_id']; ?>" data-toggle="modal" data-target="#modalDelete"> Delete</button>
                                                     </td>
                                                 </tr>
                                             <?php } ?>
                                         <?php } else { ?>
                                             <tr>
                                                 <td colspan="6" class="text-center">Tidak ada data</td>
                                             </tr>
                                         <?php } ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>

                 </div>
             </section>
             <div>
                 <br>
             </div>
         </div>