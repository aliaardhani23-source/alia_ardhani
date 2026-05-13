<!DOCTYPE html>
<html>
<head>
    <title>Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Daftar Produk</h2>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">+ Tambah Produk</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Stok</th>
                <th>Harga</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->stok }}</td>
                <td>Rp {{ number_format($p->harga) }}</td>
                <td>
                    <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>