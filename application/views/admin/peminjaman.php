                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>
                        <a href="<?php echo site_url('admin/tambah_peminjaman'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Transaksi</a>
                    </div>

                    <!-- Notifikasi -->
                    <?php if ($this->session->flashdata('pesan')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Transaksi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer</th>
                                            <th>Alat Berat</th>
                                            <th>Tanggal Sewa</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Total Bayar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($transaksi as $t): ?>
                                        <tr>
                                            <td><?php echo $t->id_transaksi; ?></td>
                                            <td><?php echo $t->nama_customer; ?></td>
                                            <td><?php echo $t->nama_alat; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($t->tanggal_sewa)); ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($t->tanggal_kembali)); ?></td>
                                            <td><?php echo "Rp " . number_format($t->total_bayar, 0, ',', '.'); ?></td>
                                            <td>
                                                <?php 
                                                if ($t->status == 'proses') {
                                                    echo '<span class="badge badge-warning">Proses</span>';
                                                } elseif ($t->status == 'selesai') {
                                                    echo '<span class="badge badge-success">Selesai</span>';
                                                } else {
                                                    echo '<span class="badge badge-danger">Batal</span>';
                                                }
                                                ?>
                                            </td>
                                            <td width="180">
                                                <a href="<?php echo site_url('admin/edit_peminjaman/'.$t->id_transaksi); ?>" class="btn btn-sm btn-info">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <?php if ($t->status == 'proses'): ?>
                                                <a href="<?php echo site_url('admin/transaksi_selesai/'.$t->id_transaksi); ?>" class="btn btn-sm btn-success">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <?php endif; ?>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $t->id_transaksi; ?>">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        
                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="deleteModal<?php echo $t->id_transaksi; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus transaksi <strong>#<?php echo $t->id_transaksi; ?></strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <a href="<?php echo site_url('admin/hapus_peminjaman/'.$t->id_transaksi); ?>" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
