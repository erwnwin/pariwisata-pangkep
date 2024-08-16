         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Riwayat Pengaduan</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">

                     <div class="card card-default">
                         <div class="card-header">
                             <h3 class="card-title">Daftar Riwayat Pengaduan</h3>

                             <!-- <div class="card-tools">
                                 <a href="<?= base_url('jasa-titip/create') ?>" class="btn btn-sm btn-primary">
                                     <i class="fa fa-plus-circle"></i> Create
                                 </a>
                             </div> -->
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <form method="get" action="<?= base_url('pengaduan') ?>">
                                 <div class="row">
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label for="nama_wisata">Nama Wisata</label>
                                             <select id="nama_wisata" name="nama_wisata" class="form-control">
                                                 <option value="">Semua</option>
                                                 <?php foreach ($wisata_list as $wisata): ?>
                                                     <option value="<?= $wisata['nama_wisata'] ?>" <?= $selected_wisata == $wisata['nama_wisata'] ? 'selected' : '' ?>>
                                                         <?= $wisata['nama_wisata'] ?>
                                                     </option>
                                                 <?php endforeach; ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label for="bulan">Bulan</label>
                                             <select id="bulan" name="bulan" class="form-control">
                                                 <option value="">Semua</option>
                                                 <?php
                                                    $bulan_indonesia = [
                                                        '1' => 'Januari',
                                                        '2' => 'Februari',
                                                        '3' => 'Maret',
                                                        '4' => 'April',
                                                        '5' => 'Mei',
                                                        '6' => 'Juni',
                                                        '7' => 'Juli',
                                                        '8' => 'Agustus',
                                                        '9' => 'September',
                                                        '10' => 'Oktober',
                                                        '11' => 'November',
                                                        '12' => 'Desember'
                                                    ];
                                                    foreach ($bulan_indonesia as $key => $value): ?>
                                                     <option value="<?= $key ?>" <?= $selected_bulan == $key ? 'selected' : '' ?>>
                                                         <?= $value ?>
                                                     </option>
                                                 <?php endforeach; ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label for="tahun">Tahun</label>
                                             <select id="tahun" name="tahun" class="form-control">
                                                 <option value="">Semua</option>
                                                 <?php foreach ($years as $year): ?>
                                                     <option value="<?= $year ?>" <?= $selected_tahun == $year ? 'selected' : '' ?>>
                                                         <?= $year ?>
                                                     </option>
                                                 <?php endforeach; ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label>&nbsp;</label>
                                             <button type="submit" class="btn btn-primaryku btn-block">Filter</button>
                                         </div>
                                     </div>
                                 </div>
                             </form>

                             <div class="table-responsive">
                                 <table class="table">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px">#</th>
                                             <th>Nama Wisata</th>
                                             <th>Isi Pengaduan</th>
                                             <th style="width: 200px">Date Sent</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if (!empty($pengaduan)) { ?>
                                             <?php $no = 1; ?>
                                             <?php foreach ($pengaduan as $r) { ?>
                                                 <tr>
                                                     <td><?= $no++; ?></td>
                                                     <td><?php echo $r['nama_wisata']; ?></td>
                                                     <td><?php echo $r['pengaduan']; ?></td>
                                                     <td>
                                                         <?php if ($r['is_recent']) { ?>
                                                             <span class="badge bg-secondary">Terbaru</span>
                                                         <?php } ?>
                                                         <button type="button" class="btn btn-sm btn-outline-danger delete-btn">
                                                             <?php echo $r['created_at']; ?>
                                                         </button>
                                                     </td>
                                                 </tr>
                                             <?php } ?>
                                         <?php } else { ?>
                                             <tr>
                                                 <td colspan="4" class="text-center">Tidak ada data</td>
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