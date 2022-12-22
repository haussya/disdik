<?= $this->extend('user/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Akun</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/user">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Akun</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success order-last mb-4" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
        </div>
      <?php endif; ?>
    </div>
    

    <form method="POST" action="/user/akun">
        <?= csrf_field(); ?>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card mb-5">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="username">Username Baru</label>
                                                <input type="text" id="username"
                                                    class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>"
                                                    placeholder="Username" name="username" autofocus
                                                    value="<?= $user['username']; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('username'); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="password">Password Baru</label>
                                                <input type="password" id="password"
                                                    class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>"
                                                    placeholder="Password" name="password"
                                                    value="<?= old('password'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('password'); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select id="role" class="form-control" name="role" required>
                                                    <option value="user"
                                                        <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('role'); ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
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
    <a href="/user/index" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
</div>
</form>
</div>
<?= $this->endSection() ?>