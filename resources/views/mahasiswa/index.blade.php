@extends('tampilan.master')
@section('content')
        <div class="main-content">
            <div class="container-fluid">
                            @if(session('sukses'))
                                <div class="alert alert-success" role="alert">
                                {{session('sukses')}}
                                </div>
                            @endif
                <div class="row">

                <div class="col-md-12">

			<!-- TABLE HOVER -->
			<div class="panel">
				    <div class="panel-heading">
                        <h3 class="panel-title">Data Mahasiswa</h3>
                        @if(Auth::check() && Auth::user()->role =='admin')
                        <div class="right">
                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><a class="btn btn-success">Tambah Data Siswa</a></button>
                        </div>
                        @endif  
                    </div>
				<div class="panel-body">
                <form action="{{ url('mahasiswa') }}" method="get">
                    <div class="input-group">
                                                <input class="form-control" name="cari" type="text" placeholder="Tulis Nama Mahasiswa">
                                                <span  class="input-group-btn"><button class="btn btn-primary">Cari</button></span> 
                    </div>
                </form>
                <br>
					<table class="table table-hover">
						<thead>
							<tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Angkatan</th>
                            </tr>
						</thead>
						<tbody>
                        
                        @foreach($data_mahasiswa as $mahasiswa)
                        <tr>
                        <td>{{$mahasiswa->id}}</td>
                            <td><a href="{{ url('mahasiswa/'.$mahasiswa->id.'/detail') }}">{{$mahasiswa->Nama}}</a></td>
                            <td>{{$mahasiswa->Angkatan}}</td>
                            @if(Auth::check() && Auth::user()->role =='admin')
                            <td><a href="{{ url('mahasiswa/'.$mahasiswa->id.'/editmahasiswa') }}" class="btn btn-warning btn-sm" >Ubah</a></td>
                            <td><a href="{{ url('mahasiswa/'.$mahasiswa->id.'/hapus') }}" class="btn btn-danger btn-sm" onclick="return confirm('Hapus nih ?')">Hapus</a></td>
                            @endif
                        </tr>
                        @endforeach
                        </tbody>
					</table>
                    <b>Halaman :</b>                   <span class="badge">{{ $data_mahasiswa->currentPage() }}</span><br/>
                    <b> Jumlah Data :</b>              <span class="badge"> {{ $data_mahasiswa->total() }} </span><br/>
                    <b> Data Per Halaman : </b>         <span class="badge">  {{ $data_mahasiswa->perPage() }}</span> <br/>
                
                
                    {{ $data_mahasiswa->links() }}
				</div>
			</div>
			<!-- END TABLE HOVER -->

		</div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Inputkan Datanya</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <form action="{{ url('mahasiswa/create') }}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIM</label>
                                <input name="id" type="int" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIM">
                                <small id="emailHelp" class="form-text text-muted">Masukan NIM Mahasiswa</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input name="Nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
                                <small id="emailHelp" class="form-text text-muted">Masukan Namanya</small>
                            </div>
       
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input name="Tgl_Lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal Lahir">
                                <small id="emailHelp" class="form-text text-muted">Masukan Tanggal Lahir</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Angkatan</label>
                                <input name="Angkatan" type="int" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Angkatan">
                                <small id="emailHelp" class="form-text text-muted">Masukan Angkatennya</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Gender</label>
                               <select name="Gender" id="Gender" class="form-control">
                               <option value="Laki-laki">Laki-laki</option>
                               <option value="Perempuan">Perempuan</option>
                               </select>
                                <small id="emailHelp" class="form-text text-muted">Masukan Gendernya</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input name="Alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat">
                                <small id="emailHelp" class="form-text text-muted">Masukan Alamat</small>
                            </div>

                            <div class="form-group">
                                                        <label for="exampleInputEmail1">Foto</label>
                                                        <input name="fotomhs" type="file" class="form-control">
                                                        <small id="emailHelp" class="form-text text-muted">Masukan Fotonya</small>
                            </div>
                            
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                    </div>
                </div>


@endsection

