<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Beasiswa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/beasiswasd">Data Beasiswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Beasiswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <form method="POST" action="<?= base_url('/admin/datauser/update/'.$dataEdit['user_id'] )?>">
        <?= csrf_field(); ?>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                            
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input value="<?php echo $dataEdit['username'] ?>" type="text" id="username"
                                                    class="form-control" placeholder="username" name="username">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama">Password</label>
                                                <input value="<?php echo $dataEdit['password'] ?>" type="text" id="password"
                                                    class="form-control" placeholder="password" name="password">
                                            </div>
                                        </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>