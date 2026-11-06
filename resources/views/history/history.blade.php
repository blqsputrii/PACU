<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Progress - PACU</title>
</head>
<body>
    <h1>History Progress</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kategori Agen</th>
                <th>Domisili</th>
                <th>Nama Agen</th>
                <th>No Telepon Agen</th>
                <th>No Telepon Kantor</th>
            </tr>
        </thead>
        <tbody>
            @forelse($prospects as $p)
            <tr>
                <td>{{ $p->prospect_date ?? '-' }}</td>
                <td>{{ $p->category->nama_kategori ?? '-' }}</td>
                <td>{{ $p->domisili ?? '-' }}</td>
                <td>{{ $p->nama_prospek }}</td>
                <td>{{ $p->nomor_telepon }}</td>
                <td>{{ $p->no_telp_kantor ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6">Belum ada riwayat progress.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
