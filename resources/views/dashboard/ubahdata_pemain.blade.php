@extends('layouts.dashboard')
@section('content')

<body id="page-top">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <h3>Form Ubah Data Aktivitas Pemain</h3>
        <!-- Content Row -->
        <form method="POST" action="{{url('update', $activity->id_pemain)}}">
            @csrf
            <!-- <input type="hidden" name="id" id="id" value="{{$activity->id_pemain}}"> -->
            <div class="form-group">
                <label for="nama">Nama</label>
                <input value="{{$activity->nama}}" type="text" class="form-control" id="nama" placeholder="Masukkan Nama Pemain" name="nama">
            </div>
            <div class="form-group">
                <label for="nama">Point</label>
                <input value="{{$activity->point}}" type="text" class="form-control" id="point" placeholder="Masukkan Total Point Pemain" name="point">
            </div>
            <div class="form-group">
                <label for="nama">Assist</label>
                <input value="{{$activity->assist}}" type="text" class="form-control" id="assist" placeholder="Masukkan Total Assist Pemain" name="assist">
            </div>
            <div class="form-group">
                <label for="nama">Steal</label>
                <input value="{{$activity->steal}}" type="text" class="form-control" id="steal" placeholder="Masukkan Total Steal Pemain" name="steal">
            </div>
            <div class="form-group">
                <label for="nama">Block</label>
                <input value="{{$activity->block}}" type="text" class="form-control" id="block" placeholder="Masukkan Total Block Pemain" name="block">
            </div>
            <div class="form-group">
                <label for="nama">Rebound</label>
                <input value="{{$activity->rebound}}" type="text" class="form-control" id="rebound" placeholder="Masukkan Total Rebound Pemain" name="rebound">
            </div>
            <div class="row">
                <button class="btn btn-success" type="submit">Ubah Data Pemain</button>
            </div>

        </form>
    </div>

</body>

@endsection