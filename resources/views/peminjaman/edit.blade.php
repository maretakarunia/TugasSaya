@extends('layout')
@section('konten')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Peminjaman</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/peminjaman">Peminjaman</a></li>
                    <li class="breadcrumb-item active">Tambah Peminjaman</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Peminjaman</h3>
            </div>
            <div class="card-body">
                @foreach($data as $data)
                <form action="/peminjaman/update" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="idpeminjaman" value="{{ $peminjaman->idpeminjaman }}">

                    <div class="form-group">
                        <label for="idinventaris">Inventaris</label>
                        <select name="idinventaris" class="form-control" id="idinventaris">
                            <option value="">-- Inventaris --</option>
                            @foreach ($detail_inventaris as $item)
                            <option value="{{ $item['idinventaris'] }}" {{ $item['idinventaris'] == $data->idinventaris ? 'selected' : '' }}>{{ $item['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="idpegawai">Pegawai</label>
                        <select name="idpegawai" class="form-control" id="idpegawai">
                            <option value="">-- Pegawai --</option>
                            @foreach ($detail_pegawai as $item)
                            <option value="{{ $item['idpegawai'] }}" {{ $item['idpegawai'] == $data->idpegawai ? 'selected' : '' }}>{{ $item['namapegawai'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggalpeminjaman">Tanggal Pinjam</label>
                        <input type="date" name="tanggalpeminjaman" class="form-control" id="tanggalpeminjaman" value="{{ $data->tanggalpeminjaman }}">
                    </div>

                    <div class="form-group">
                        <label for="tanggalkembali">Tanggal Kembali</label>
                        <input type="date" name="tanggalkembali" class="form-control" id="tanggalkembali" value="{{ $data->tanggalkembali }}">
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah" value="{{ $peminjaman->jumlah ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="statuspeminjaman">Status Peminjaman</label>
                        <select class="form-control" id="statuspeminjaman" name="statuspeminjaman" required>
                            <option value="">-- Kondisi --</option>
                            <option value="Diproses" {{ $data->statuspeminjaman == 'Diproses' ? 'selected' : '' }}>Sedang Dalam Proses Peminjaman</option>
                            <option value="Dipinjam" {{ $data->statuspeminjaman == 'Dipinjam' ? 'selected' : '' }}>Masih Peminjaman</option>
                            <option value="ProsesKembali" {{ $data->statuspeminjaman == 'ProsesKembali' ? 'selected' : '' }}>Sedang Dalam Proses Dikembalikan</option>
                            <option value="Dikembalikan" {{ $data->statuspeminjaman == 'Dikembalikan' ? 'selected' : '' }}>Sudah Dikembalikan</option>
                            <option value="Peminjaman Ditolak" {{ $data->statuspeminjaman == 'Peminjaman Ditolak' ? 'selected' : '' }}>Peminjaman Ditolak</option>
                            <option value="Pengembalian Ditolak" {{ $data->statuspeminjaman == 'Pengembalian Ditolak' ? 'selected' : '' }}>Pengembalian Ditolak</option>
                        </select>
                    </div>

                    <div class="form-group text-right">
                        <a href="/peminjaman" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
