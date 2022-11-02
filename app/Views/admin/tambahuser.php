<?= $this->extend('user/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Data Siswa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/user">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/user/datasiswasd">Data Siswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Siswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <form method="POST" action="/admin/datauser/simpan">
        <?= csrf_field(); ?>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" id="username"
                                                    class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>"
                                                    placeholder="username" name="username" autofocus
                                                    value="<?= old('username'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('username'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="password">password</label>
                                                <input type="text" id="password"
                                                    class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>"
                                                    placeholder="password Siswa" name="password"
                                                    value="<?= old('password'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('password'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_sekolah">sekolah</label>
                                                <input type="text" id="sekolah"
                                                    class="form-control <?= ($validation->hasError('nama_sekolah')) ? 'is-invalid' : ''; ?>"
                                                    placeholder="nama_sekolah" name="nama_sekolah"
                                                    value="<?= old('nama_sekolah'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama_sekolah'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="jenjang">Jenjang</label>
                                                <select id="jenjang" class="form-control"
                                                    name="jenjang" required>
                                                    <option value="">Pilih ...</option>
                                                    <option value="SD">SD</option>
                                                    <option value="SMP">SMP</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select id="role" class="form-control"
                                                    name="role" required>
                                                    <option value="">Pilih ...</option>
                                                    <option value="admin">admin</option>
                                                    <option value="user">user</option>
                                                </select>
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
        <!-- keterangan -->
        <section id="kentut">

        </section>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
        </div>
    </form>

</div>

<script>
// var opal = `<input type="hidden" name="isDO" value="ket">
//             <div class="row match-height">
//                 <div class="col-12">
//                     <div class="card">
//                         <div class="card-content">
//                             <div class="card-body">
//                                 <div class="form">
//                                     <div class="row">
//                                         <div class="col-md-6 col-12">
//                                             <div class="form-group">
//                                                 <label for="faktor">Faktor</label>
//                                                 <select id="faktor" class="form-control" name="faktor" required>
//                                                     <option value="">Pilih ...</option>
//                                                     <option value="putus sekolah">Putus Sekolah</option>
//                                                     <option value="berkerja">Berkerja</option>
//                                                 </select>
//                                             </div>
//                                         </div>
//                                         <div class="col-md-6 col-12">
//                                             <div class="form-group">
//                                                 <label for="rencana_melanjutkan">Rencana Melanjutkan</label>
//                                                 <select id="rencana_melanjutkan" class="form-control"
//                                                     name="rencana_melanjutkan" required>
//                                                     <option value="">Pilih ...</option>
//                                                     <option value="ya">Ya</option>
//                                                     <option value="tidak">Tidak</option>
//                                                 </select>
//                                             </div>
//                                         </div>
//                                         <div class="col-md-6 col-12">
//                                             <div class="form-group">
//                                                 <label for="alasan_tidak_melanjutkan">Alasan Tidak Melanjutkan</label>
//                                                 <input type="text" id="alasan_tidak_melanjutkan"
//                                                     class="form-control <?= ($validation->hasError('alasan_tidak_melanjutkan')) ? 'is-invalid' : ''; ?>"
//                                                     placeholder="faktor" name="alasan_tidak_melanjutkan" autofocus
//                                                     value="<?= old('alasan_tidak_melanjutkan'); ?>">
//                                                 <div class="invalid-feedback">
//                                                     <?= $validation->getError('alasan_tidak_melanjutkan'); ?>
//                                                 </div>
//                                             </div>
//                                         </div>
//                                     </div>
//                                 </div>
//                             </div>
//                         </div>
//                     </div>
//                 </div>
//             </div>`;
// document.getElementById('status').addEventListener('change', (e) => {
//     console.log(e.target.value)
//     if (e.target.value == 0) {
//         console.log('dsadasdasdsadasd');
//         document.getElementById('kentut').innerHTML = opal;
//     } else {
//         document.getElementById('kentut').innerHTML = '';
//     }
// })
// 
</script>
<?= $this->endSection() ?>