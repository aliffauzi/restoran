<!doctype html>
<html lang="en">
 
<head>
    <?php $this->load->view('_partials/head'); ?>
    <title>Data Transaksi</title>
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
                            <h2 class="pageheader-title">Data Transaksi</h2>
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
                            <h5 class="card-header">Data Transaksi</h5>
                            <div class="card-body">
                                <div class="info">
                                    <?php if ($this->session->flashdata('hapus')): ?>
                                        <div class="alert alert-danger">Sukses Menghapus Data</div>
                                    <?php endif ?>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Masakan</th>
                                                <th>No Meja</th>
                                                <th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($transaksi === 'kosong'): ?>
                                                <tr>
                                                    <td colspan="5" align="center">Kosong</td>
                                                </tr>
                                            <?php else: ?>
                                                <?php foreach ($transaksi as $key => $value): ?>
                                                    <tr>
                                                        <td><?php echo $key+1 ?></td>
                                                        <td><?php foreach ($value->masakan as $key => $val): ?>
                                                            <table>
                                                                <tr><?php echo $val ?> <span class="badge badge-primary"><?php echo $value->total[$key] ?></span></tr>
                                                            </table>
                                                        <?php endforeach ?></td>
                                                        <td><?php echo $value->no_meja ?></td>
                                                        <td><?php echo $value->tanggal ?></td>
                                                        <td width="20%">
                                                            <a href="<?php echo site_url('transaksi/detail/').$value->id ?>" class="btn btn-success btn-sm">Detail</a>
                                                            <a href="<?php echo site_url('transaksi/hapus/').$value->id ?>" class="btn btn-danger btn-sm">Hapus</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </tbody>
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
    </form>
    </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <?php $this->load->view('_partials/foot'); ?>
</body>
 
</html>