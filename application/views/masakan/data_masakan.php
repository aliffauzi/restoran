<!doctype html>
<html lang="en">
 
<head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/concept-master/assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/concept-master/assets/vendor/select2/css/select2.css">
    <?php $this->load->view('_partials/head'); ?>
    <title>Masakan</title>
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
                            <h2 class="pageheader-title">Data Masakan</h2>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Data Masakan</h5>
                                <div>
                                    <button class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#tambah">Tambah</button>
                                    <button class="btn btn-secondary btn-sm d-none batal" data-toggle="collapse" data-target="#tambah">Batal</button>
                                </div>
                            </div>
                            <div class="card-body border-bottom collapse" id="tambah">
                                <form method="post" action="<?php echo site_url('masakan/add') ?>">
                                    <div class="info"></div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control select2" name="id_kategori" required></select>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" name="harga" class="form-control" placeholder="Harga" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" class="form-control" name="gambar" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Tambah</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="info"></div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Gambar</th>
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
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
    <div class="modal">
    <div class="modal-dialog">
    <div class="modal-content">
    <form method="post">
        <div class="modal-header">
            <h5 class="modal-title m-0">Edit Data</h5>
            <button class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="info"></div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control select2" name="id_kategori" required></select>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Harga" required>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" class="form-control" name="gambar">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
            <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
    </form>
    </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <?php $this->load->view('_partials/foot'); ?>
    <script src="<?php echo base_url() ?>assets/concept-master/assets/vendor/parsley/parsley.js"></script>
    <script src="<?php echo base_url() ?>assets/concept-master/assets/vendor/datatables/js/data-table.js"></script>
    <script src="<?php echo base_url() ?>assets/concept-master/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/concept-master/assets/vendor/select2/js/select2.min.js"></script>
    <script>
        let read_url = '<?php echo site_url('masakan/read') ?>'
        let edit_url = '<?php echo site_url('masakan/edit') ?>'
        let hapus_url = '<?php echo site_url('masakan/delete') ?>'
        let get_kategori_url = '<?php echo site_url('kategori_masakan/get_kategori') ?>'
        let base_url = '<?php echo base_url() ?>'
    </script>
    <script src="<?php echo base_url() ?>assets/js/masakan/masakan.js"></script>
</body>
 
</html>