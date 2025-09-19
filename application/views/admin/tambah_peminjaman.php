                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Transaksi</h1>
                        <a href="<?php echo site_url('admin/peminjaman'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
                    </div>

                    <!-- Form Input -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Transaksi</h6>
                        </div>
                        <div class="card-body">
                            <?php echo form_open('admin/simpan_peminjaman'); ?>
                            <div class="form-group">
                                <label for="id_customer">Customer</label>
                                <?php 
                                $options = array();
                                foreach ($customer as $c) {
                                    $options[$c->id_customer] = $c->nama_customer;
                                }
                                echo form_dropdown('id_customer', $options, '', array('class' => 'form-control', 'id' => 'id_customer'));
                                ?>
                                <?php echo form_error('id_customer', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="id_alat">Alat Berat</label>
                                <?php 
                                $options = array();
                                foreach ($alat as $a) {
                                    $options[$a->id_alat] = $a->nama_alat . ' - ' . $a->merk . ' (Rp ' . number_format($a->harga_sewa, 0, ',', '.') . '/hari)';
                                }
                                echo form_dropdown('id_alat', $options, '', array('class' => 'form-control', 'id' => 'id_alat'));
                                ?>
                                <?php echo form_error('id_alat', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_sewa">Tanggal Sewa</label>
                                        <?php echo form_input('tanggal_sewa', '', array('class' => 'form-control', 'id' => 'tanggal_sewa', 'type' => 'date')); ?>
                                        <?php echo form_error('tanggal_sewa', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_kembali">Tanggal Kembali</label>
                                        <?php echo form_input('tanggal_kembali', '', array('class' => 'form-control', 'id' => 'tanggal_kembali', 'type' => 'date')); ?>
                                        <?php echo form_error('tanggal_kembali', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="total_bayar">Total Bayar</label>
                                <?php echo form_input('total_bayar', '', array('class' => 'form-control', 'id' => 'total_bayar', 'placeholder' => 'Masukkan total bayar')); ?>
                                <?php echo form_error('total_bayar', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?php echo site_url('admin/peminjaman'); ?>" class="btn btn-secondary">Batal</a>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
