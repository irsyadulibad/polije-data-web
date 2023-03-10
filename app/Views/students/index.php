<?= $this->extend('layouts/app') ?>

<?= $this->section('style') ?>
<style>
    .profile-icon {
        width: 100%;
        height: 100%;
    }

    .detail-icon {
        width: 18px;
        height: 18px;
    }

    .student-card {
        min-height: 145px;
    }

    #filter-button {
        cursor: pointer;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center mt-5">
    <div class="col-md-6 d-flex">
        <div class="input-group mb-3">
            <span class="input-group-text">
                <i data-feather="search"></i>
            </span>
            <input type="text" name="" id="keyword" class="form-control" placeholder="Cari..." autofocus>
            <span class="input-group-text" id="filter-button">
                <i data-feather="filter"></i>
            </span>
        </div>
    </div>
</div>
<div class="row justify-content-between mt-4">
    <div class="col-md-3 pt-3">
        <h6>Total: <span id="total-results" class="ms-2">-</span></h6>
    </div>
    <div class="col-md-2">
        <div class="input-group input-group-sm">
            <span class="input-group-text">
                <i style="width: 18px;" data-feather="chevrons-up"></i>
            </span>
            <select id="order" class="form-control">
                <option value="">-- Urut Berdasar --</option>
                <option value="fullname">Nama</option>
                <option value="nim">NIM</option>
                <option value="born_date">Tanggal Lahir</option>
            </select>
        </div>
    </div>
</div>
<div class="row justify-content-center mb-4" id="student-wrapper">
</div>
<div class="d-flex justify-content-center" id="student-loader">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<style>
    p {
        margin: 0;
    }

    #detail-modal .modal-body {
        min-height: 80vh;
    }
</style>
<div class="modal modal-lg" tabindex="-1" id="detail-modal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Mahasiswa</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center" id="loader">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="modal-body row d-none" id="detail-data">
                <div class="col-md-6">
                    <h6 class="text-center mt-4"><i data-feather="user" class="me-2"></i> Biodata</h6>

                    <ul class="list-group m-3">
                        <li class="list-group-item">
                            <p class="fw-bold">Nama</p>
                            <p id="fullname-text">-</p>
                        </li>
                        <li class="list-group-item">
                            <p class="fw-bold">NIM</p>
                            <p id="nim-text">-</p>
                        </li>
                        <li class="list-group-item">
                            <p class="fw-bold">Tempat Lahir</p>
                            <p id="born_place-text">-</p>
                        </li>
                        <li class="list-group-item">
                            <p class="fw-bold">Tanggal Lahir</p>
                            <p id="born_date-text">-</p>
                        </li>
                        <li class="list-group-item">
                            <p class="fw-bold">No HP</p>
                            <p id="phone-text">-</p>
                        </li>
                        <li class="list-group-item">
                            <p class="fw-bold">Asal Sekolah</p>
                            <p id="school-text">-</p>
                        </li>
                        <li class="list-group-item">
                            <p class="fw-bold">Alamat</p>
                            <p id="address-text">-</p>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <h6 class="text-center mt-4"><i data-feather="file" class="me-2"></i> Akademik</h6>

                    <ul class="list-group m-3">
                        <li class="list-group-item">
                            <p class="fw-bold">Jurusan</p>
                            <p id="major-text">-</p>
                        </li>
                        <li class="list-group-item">
                            <p class="fw-bold">Jalur Masuk</p>
                            <p id="admission-text">-</p>
                        </li>
                    </ul>

                    <h6 class="text-center mt-4"><i data-feather="columns" class="me-2"></i> Administrasi</h6>

                    <ul class="list-group m-3">
                        <li class="list-group-item">
                            <p class="fw-bold">Biaya UKT</p>
                            <p id="ukt_cost-text">-</p>
                        </li>
                        <li class="list-group-item">
                            <p class="fw-bold">Biaya SPI / Lainnya</p>
                            <p id="etc_cost-text">-</p>
                        </li>
                        <li class="list-group-item">
                            <p class="fw-bold">No Briva</p>
                            <p id="briva-text">-</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="filter-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->include('students/script') ?>
<?= $this->include('students/detail') ?>
<?= $this->endSection() ?>
