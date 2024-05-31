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
           <li class="breadcrumb-item ml-1"><a href="/peminjaman/list">Peminjaman</a></li>
           <li class="breadcrumb-item active ml-1">Detail Peminjaman</li>
         </ol>
       </div>
      </div>
    </div>
  </div>
</div>

 <!-- Main content -->
 <div class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
             
            <h3>Detail Data Peminjaman</h3>
          </div>
            <!-- /.card-header -->
            <div class="card-body">
              @foreach($data as $data)
              <form action="/peminjaman/update" method="POST">
                  @csrf
                  @method('POST')
                  <input type="hidden" name="idpeminjaman" value="{{ $peminjaman->idpeminjaman }}">

                  <div class="row mt-1">
                      <div class="col-md-4 mt-1">
                          <label for="">Inventaris</label>
                      </div>
                      <div class="col-md-8 mt-1">
                          <div class="d-flex">
                              <select name="idinventaris" class="form-control" id="" readonly>
                                  <option value="">-- Inventaris --</option>
                                  @foreach ($detail_inventaris as $item)
                                  <option value="{{ $item['idinventaris'] }}" {{ $item['idinventaris'] == $data->idinventaris ? 'selected' : '' }}>{{ $item['nama'] }}</option>
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
                              <select name="idpegawai" class="form-control" id="" readonly>
                                  <option value="">-- Pegawai --</option>
                                  @foreach ($detail_pegawai as $item)
                                  <option value="{{ $item['idpegawai'] }}" {{ $item['idpegawai'] == $data->idpegawai ? 'selected' : '' }}>{{ $item['namapegawai'] }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                  </div>

                  <div class="row mt-1">
                      <div class="col-md-4 mt-1">
                          <label for="">Tanggal Pinjam</label>
                      </div>
                      <div class="col-md-8 mt-1">
                          <input type="date" name="tanggalpeminjaman" class="form-control" placeholder="Tanggal Pinjam" value="{{ $data->tanggalpeminjaman }}" readonly>
                      </div>
                  </div>
                  <div class="row mt-1">
                      <div class="col-md-4 mt-1">
                          <label for="">Tanggal Kembali</label>
                      </div>
                      <div class="col-md-8 mt-1">
                          <input type="date" name="tanggalkembali" class="form-control" placeholder="Tanggal Kembali" value="{{ $data->tanggalkembali }}" readonly>
                      </div>
                  </div>

                  <div class="row mt-1">
                      <div class="col-md-4 mt-1">
                          <label for="">Jumlah</label>
                      </div>
                      <div class="col-md-8 mt-1">
                          <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah" value="{{ $peminjaman->jumlah ?? '' }}" readonly>
                      </div>
                  </div>


                  <div class="row mt-1">
                      <div class="col-md-4 mt-1">
                          <label for="">Status Peminjaman</label>
                      </div>
                      <div class="col-md-8 mt-1">
                          <div class="d-flex">
                              <select class="form-control" id="statuspeminjaman" name="statuspeminjaman" required readonly>
                                  <option value="">-- Kondisi --</option>
                                  <option value="Diproses" {{ $data->statuspeminjaman == 'Diproses' ? 'selected' : '' }}>Sedang Dalam Proses Peminjaman</option>
                                  <option value="Dipinjam" {{ $data->statuspeminjaman == 'Dipinjam' ? 'selected' : '' }}>Masih dipinjam</option>
                                  <option value="ProsesKembali" {{ $data->statuspeminjaman == 'ProsesKembali' ? 'selected' : '' }}>Sedang Dalam Proses Pengembalian</option>
                                  <option value="Dikembalikan" {{ $data->statuspeminjaman == 'Dikembalikan' ? 'selected' : '' }}>Sudah dikembalikan</option>
                                  <option value="Peminjaman Ditolak" {{ $data->statuspeminjaman == 'Peminjaman Ditolak' ? 'selected' : '' }}>Peminjaman Ditolak</option>
                                  <option value="Pengembalian Ditolak" {{ $data->statuspeminjaman == 'Pengembalian Ditolak' ? 'selected' : '' }}>Pengembalian Ditolak</option>
                              </select>
                          </div>
                      </div>
                  </div>

              </form>
              @endforeach

          </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
       </div>
       <!-- /.col-md-6 -->
   
       <!-- /.col-md-6 -->
     </div>
     <!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>

@endsection