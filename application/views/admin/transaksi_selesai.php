                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Selesaikan Transaksi</h1>
                        <a href="<?php echo site_url('admin/peminjaman'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
                    </div>

                    <!-- Form Input -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Selesaikan Transaksi</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            Informasi Transaksi
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td width="30%">ID Transaksi</td>
                                                    <td>: <?php echo $transaksi->id_transaksi; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Customer</td>
                                                    <td>: <?php echo $transaksi->nama_customer; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alat Berat</td>
                                                    <td>: <?php echo $transaksi->nama_alat; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Sewa</td>
                                                    <td>: <?php echo date('d-m-Y', strtotime($transaksi->tanggal_sewa)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Kembali</td>
                                                    <td>: <?php echo date('d-m-Y', strtotime($transaksi->tanggal_kembali)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Total Bayar</td>
                                                    <td>: Rp <?php echo number_format($transaksi->total_bayar, 0, ',', '.'); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            Form Pengembalian
                                        </div>
                                        <div class="card-body">
                                            <?php echo form_open('admin/proses_selesai'); ?>
                                            <?php echo form_hidden('id_transaksi', $transaksi->id_transaksi); ?>
                                            <div class="form-group">
                                                <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                                                <?php echo form_input('tanggal_pengembalian', date('Y-m-d'), array('class' => 'form-control', 'id' => 'tanggal_pengembalian', 'type' => 'date')); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="denda">Denda (jika ada)</label>
                                                <?php echo form_input('denda', '0', array('class' => 'form-control', 'id' => 'denda', 'placeholder' => 'Masukkan denda jika ada')); ?>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Proses Selesai</button>
                                                <a href="<?php echo site_url('admin/peminjaman'); ?>" class="btn btn-secondary">Batal</a>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
