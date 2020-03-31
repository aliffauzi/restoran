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
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header">
                <h3 class="mb-1">Login Form</h3>
                <p>Isi Data Akunmu.</p>
            </div>
            <div class="card-body">
                <div class="info"></div>
                <form>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="Username" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password" required>
                    </div>
                    <div class="form-group pt-2">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-white">
                <p>Belum ada akun? <a href="<?php echo site_url('register') ?>" class="text-secondary">Register disini.</a></p>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
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
                    url: '<?php echo site_url('login') ?>',
                    type: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: res => {
                        let alert = $('.info')
                        if (res === 'username') {
                            alert.html(`<div class="alert alert-danger">Username Tidak Ada</div>`)
                        } else if (res === 'password') {
                            alert.html(`<div class="alert alert-danger">Password Salah</div>`)
                        } else {
                            alert.html(`<div class="alert alert-success">Login Sukses</div>`)
                            setTimeout(function () {
                                window.location.reload()
                            }, 100)
                        }
                        console.log(res)
                    },
                    error: err => {
                        console.log(err)
                    }
                })
            })
        })
    </script>
</body>
 
</html>