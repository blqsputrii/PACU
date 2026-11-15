@extends('layouts.app')

@section('title', 'History Progress')

@section('content')
<div class="py-3">
    <h2 class="fw-bold text-pacu-orange text-center mb-4">History Progress</h2>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr class="border-bottom">
                    <th>Tanggal</th>
                    <th>Kategori Agen</th>
                    <th>Domisili</th>
                    <th>Nama Agen</th>
                    <th>No Telepon Agen</th>
                    <th>No Telepon Kantor</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($prospects as $p)
                    <tr>
                        <td>{{ $p->prospect_date }}</td>
                        <td>{{ $p->category->category_name ?? '-' }}</td>
                        <td>{{ $p->domisili }}</td>
                        <td>{{ $p->nama_agen }}</td>
                        <td>{{ $p->no_telp_agen }}</td>
                        <td>{{ $p->no_telp_kantor }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Belum ada riwayat progress.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
