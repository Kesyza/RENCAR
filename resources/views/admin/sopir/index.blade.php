@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Dashboard

@stop

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Sopir
                    <a href="{{route('sopir.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Sopir</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Sopir</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach ($sopir as $data)
                             <tr>
                                 <td>{{$no++}}</td>
                                 <td>{{$data->nama_sopir}}</td>
                                 <td>{{$data->status}}</td>
                                 <td>
                                     <form action="{{route('sopir.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('sopir.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{route('sopir.show',$data->id)}}" class="btn btn-outline-warning">Show</a>
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapusnya')">Delete</button>
                                        </form>
                                 </td>
                             </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop

@section('css')

@stop

@section('js')

@stop