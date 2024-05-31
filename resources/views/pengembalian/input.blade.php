@extends('layout')
@section('konten')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"></h1>
        </div>
        <div class="col-lg-12">
         <div class="card">
           <ol class="breadcrumb float-sm-left m-3">
             <li class="breadcrumb-item ml-1"><a href="/peminjaman">Peminjaman</a></li>
             <li class="breadcrumb-item active ml-1">Tambah Peminjaman</li>
           </ol>
         </div>
        </div>
      </div>
    </div>
  </div>

<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="store" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row mt-1">
                        <div class="col-md-4 mt-1">
                            <label for="">Inventaris</label>
                        </div>
                        <div class="col-md-8 mt-1">
                            <div class="d-flex">
                                <select name="idinventaris" class="form-control" id="idinventaris">
                                    <option value="">-- {{ isset($i_detail) ? $i_detail->nama : 'TwT' }} --</option>
                                    @foreach ($data as $item)
                                    <option value="{{ $item['idinventaris'] }}">{{ $item['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-1">
                        <div class="col-md-4 mt-1">
                            <label for="">Pegawai</label>
                        </div>
                        <div class="col-md-8 mt-1">
                            <div class="d-flex">
                                <select name="idpegawai" class="form-control" id="idpegawai">
                                    <option value="">-- {{ isset($p_detail) ? $p_detail->namapegawai : 'TwT' }} --</option>
                                    @foreach ($datap as $item)
                                    <option value="{{ $item['idpegawai'] }}">{{ $item['namapegawai'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-md-4 mt-1">
                            <label for="">Jumlah</label>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex">
                                <a href="?idinventaris={{ request('idinventaris') }}&act=min&jumlah={{ $jumlah }}" class="btn btn-primary m-1"><i class="fas fa-minus"></i></a>
                                <input type="number" value="{{ $jumlah }}" class="form-control m-1" name="jumlah">
                                <a href="?idinventaris={{ request('idinventaris') }}&act=plus&jumlah={{ $jumlah }}"  class="btn btn-primary m-1"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-1">
                        <div class="col-md-4 mt-1">
                            <label for="">Status Peminjaman</label>
                        </div>
                        <div class="col-md-8 mt-1">
                            <div class="d-flex">
                                <select class="form-control" id="statuspeminjaman" name="statuspeminjaman" required>
                                    <option value="">-- Kondisi --</option>
                                    <option value="Diproses">Sedang diproses</option>
                                    <option value="Dipinjam">Masih dipinjam</option>
                                    <option value="ProsesKembali">Proses Pengembalian</option>
                                    <option value="Dikembalikan">Sudah dikembalikan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-md-4 mt-1">
                        </div>
                        <div class="col-md-8 mt-1">
                            <a href="/peminjaman" class="btn btn-info"><i class="fas fa-arrow-left"></i>Kembali</a>
                            <input class="btn" style="background-color:rgb(0, 149, 255);" type="submit" name="submit" value="Simpan">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection