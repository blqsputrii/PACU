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
                    <th>Poin</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($prospects as $p)
                    <tr>
                        <td>{{ $p->tanggal_prospek->format('Y-m-d') }}</td>
                        <td>{{ $p->kategori->nama_kategori ?? '-' }}</td>
                        <td>{{ $p->domisili }}</td>
                        <td>{{ $p->nama_agen }}</td>
                        <td>{{ $p->no_telp_agen }}</td>
                        <td>{{ $p->no_telp_kantor }}</td>
                        <td>{{ $p->aktivitas->poin_sementara ?? 0 }}</td>
                        <td>
                            @php $status = $p->verifikasi->status ?? 'Pending'; @endphp
                            <span class="badge rounded-pill {{ $status === 'Approved' ? 'bg-success' : ($status === 'Rejected' ? 'bg-danger' : 'bg-warning text-dark') }}">
                                {{ $status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">Belum Ada Riwayat Progress</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $prospects->links() }}
</div>
@endsection
