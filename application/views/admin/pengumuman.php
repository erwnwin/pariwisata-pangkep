         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Pengumuman</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">

                     <div class="card card-default">
                         <div class="card-header">
                             <h3 class="card-title">Daftar Pengumuman/Artikel</h3>
                             <div class="card-tools">
                                 <a href="<?= base_url('pengumuman/create') ?>" class="btn btn-sm btn-primaryku"><i class="fa fa-plus-circle"></i> Create</a>
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px">#</th>
                                             <th>Judul Pengumuman/Artikel</th>
                                             <th>Isi / Deskripsi</th>
                                             <th>Gambar</th>
                                             <th style="width: 130px">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if (!empty($pengumuman)) { ?>
                                             <?php $no = 1;
                                                foreach ($pengumuman as $r) { ?>
                                                 <tr>
                                                     <td><?= $no++; ?></td>
                                                     <td><?php echo $r['judul_pengumuman']; ?></td>
                                                     <td><?php echo substr($r['deskripsi'], 0, 100); ?>.... <a href="">Selengkapnya</a></td>
                                                     <td>
                                                         <img src="<?php echo base_url('public/uploads/pengumuman/' . $r['gambar']) ?>" alt="" width="50px" height="50px">
                                                     </td>
                                                     <td>
                                                         <a href="<?= base_url('pengumuman/' . $r['encrypted_id'] . '/edit') ?>" class="btn btn-sm btn-outline-warning"> Edit </a>
                                                         <button type="button" class="btn btn-sm btn-outline-danger delete-btn" data-id="<?php echo $r['id']; ?>" data-toggle="modal" data-target="#modalDelete"> Delete</button>
                                                     </td>
                                                 </tr>
                                             <?php } ?>
                                         <?php } else { ?>
                                             <tr>
                                                 <td colspan="5" class="text-center">Tidak ada data</td>
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

         <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="modalDeleteLabel">Konfirmasi Delete</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <p>Anda yakin ingin menghapus data ini?</p>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                         <button type="button" class="btn btn-sm btn-primaryku" id="btnDelete">Hapus</button>
                     </div>
                 </div>
             </div>
         </div>