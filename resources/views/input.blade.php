@extends('layouts.app')

@section('title', 'Input Pegawai')
@section('content')

<div class="w-100 pt-5 px-3">
    <h2 class="text-center fw-bold text-warning" style="margin-bottom: 130px;">
        Input Your <br> Proggress Here!
    </h2>

    <form action="{{ route('input.pegawai.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-4">
            <div class="col-md-4">
                <label class="form-label text-dark small fw-bold">Tanggal</label>
                <input type="date" name="tanggal" class="form-control rounded-pill border-secondary-subtle px-3" required>
            </div>
            <div class="col-md-4">
                <label class="form-label text-dark small fw-bold">Kategori Agen</label>
                <select name="kategori_agen" class="form-select rounded-pill border-secondary-subtle px-3"
                    <option value="Agent Jual Properti">Agent Jual Properti</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label text-dark small fw-bold">Domisili</label>
                <input type="text" name="domisili" class="form-control rounded-pill border-secondary-subtle px-3" placeholder="Ex: Tuban" required>
            </div>
        </div>


        <div class="row mb-4">
          <div class="col-md-4">
                <label class="form-label text-dark small fw-bold">Nama Agen</label>
                <input type="text" name="nama_agen" class="form-control rounded-pill border-secondary-subtle px-3" placeholder="Name" required>
            </div>
            <div class="col-md-4">
                <label class="form-label text-dark small fw-bold">No Telpon Agen</label>
                <input type="text" name="no_telp_agen" class="form-control rounded-pill border-secondary-subtle px-3" placeholder="+6208" required>
            </div>
             <div class="col-md-4">
                <label class="form-label text-dark small fw-bold">No Telpon Kantor</label>
                <input type="text" name="no_telp_kantor" class="form-control rounded-pill border-secondary-subtle px-3" placeholder="+623" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label text-dark small fw-bold d-block">Poin</label>
            <div class="row">
                <div class="col-md-4 mb-2">
                    <div class="form-check border border-secondary-subtle rounded-pill px-4 py-2 d-flex align-items-center gap-2 bg-white">
                        <input class="form-check-input m-0" type="checkbox" name="agen_merespon" value="1" id="merespon">
                        <label class="form-check-label small mb-0 text-dark" for="merespon">Agen Merespon</label>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="form-check border border-secondary-subtle rounded-pill px-4 py-2 d-flex align-items-center gap-2 bg-white">
                        <input class="form-check-input m-0" type="checkbox" name="agen_survey" value="1" id="survey">
                        <label class="form-check-label small mb-0 text-dark" for="survey">Agen Survey</label>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="form-check border border-secondary-subtle rounded-pill px-4 py-2 d-flex align-items-center gap-2 bg-white">
                        <input class="form-check-input m-0" type="checkbox" name="agen_deal" value="1" id="deal">
                        <label class="form-check-label small mb-0 text-dark" for="deal">Agen Deal</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <label for="upload-bukti" class="text-dark fw-bold text-decoration-none" style="cursor: pointer;">
                    + Upload Bukti
                </label>
                <input type="file" name="bukti_foto" id="upload-bukti" class="d-none">
            </div>

            <div>
                <button type="submit" class="btn text-white rounded-pill px-5 py-2 fw-bold shadow-sm" style="background-color: #FFB000; border: none;">
                    Simpan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
