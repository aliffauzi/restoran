<!doctype html>
<html lang="en">
 
<head>
    <?php $this->load->view('_partials/head'); ?>
    <title>Dashboard</title>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Registrations Form</h3>
                <p>Isi datamu.</p>
            </div>
            <div class="card-body">
                <div class="info"></div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="username" required="" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1" type="password" required="" placeholder="Password">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Sudah ada akun? <a href="<?php echo site_url('login') ?>" class="text-secondary">Login disini.</a></p>
            </div>
        </div>
    </form>

    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <?php $this->load->view('_partials/foot'); ?>
    <script src="<?php echo base_url() ?>assets/concept-master/assets/vendor/parsley/parsley.js"></script>
    <script>
        $(document).ready(() => {
            $('form').parsley()
            $('form').on('submit', function(e) {
                e.preventDefault()
                $.ajax({
                    url: '<?php echo site_url('register') ?>',
                    type: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: res => {
                        $('.info').html(`<div class="alert alert-success">Registrasi Sukses</div>`)
                        setTimeout(function () {
                            window.location.href = '<?php echo site_url('') ?>'
                        }, 100)
                    },
                    error: () => $('.info').html(`<div class="alert alert-danger">Username Sudah Ada</div>`)
                })
            })
        })
    </script>
</body>
 
</html>