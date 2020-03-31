<!doctype html>
<html lang="en">
 
<head>
    <?php $this->load->view('_partials/head'); ?>
    <title>Order Masakan</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php $this->load->view('_includes/navbar'); ?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php $this->load->view('_includes/left-sidebar'); ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Order Masakan</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo site_url('') ?>" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $this->uri->segment(1) ?></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-8">
                    <div class="row">
                        <?php if ($masakan === 'kosong'): ?>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="alert alert-info">Masakan Kosong</div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php foreach ($masakan as $key => $value): ?>
                                <div class="col-6">
                                    <div class="card">
                                        <img class="card-img-top img-fluid p-2" src="<?php echo base_url('uploads/').$value->gambar ?>" alt="">
                                        <div class="card-body" id="<?php echo $value->id ?>">
                                            <h3 class="card-title mb-2"><?php echo $value->nama ?></h3>
                                            <span class="text-secondary">Rp <span class="harga"><?php echo $value->harga ?></span></span>
                                            <div class="input-group mt-3">
                                                <input type="number" class="form-control" placeholder="0" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary tambah" disabled>Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header">Data Pesanan</h5>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item kosong">Kosong</li>
                                </ul>
                                 <div class="form-group mt-3">
                                    <select name="no_meja" class="form-control select2" required>
                                        <?php if ($meja === 'kosong'): ?>
                                            <option value="" class="d-none">Meja Isi Semua</option>
                                        <?php else: ?>
                                            <option value="" class="d-none">Pilih No Meja</option>
                                            <?php foreach ($meja as $key => $value): ?>
                                                <option value="<?php echo $value->no_meja ?>"><?php echo $value->no_meja ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-block bayar" disabled>Bayar</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php $this->load->view('_includes/footer'); ?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <?php $this->load->view('_partials/foot'); ?>
    <script>
        let transaksi_url = '<?php echo site_url('transaksi/proses') ?>'
    </script>
    <script src="<?php echo base_url() ?>assets/js/order/masakan.js"></script>
</body>
 
</html>