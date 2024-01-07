@extends('temp.template')

@section('nav')

    @if (Session::get('success'))
        <div class="alert alert-success"> {{ Session::get('success') }}</div>       
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-danger"> {{ Session::get('deleted') }}</div>   
    @endif
    <div class="mb-2">
        <h4>Data Klasifikasi Surat</h4>
        <a href="/" class="list-group-item-action disabled" tabindex="-1" aria-disabled="true"></a>
        <a href="{{ route('letype.index') }}" class="list-group-item-action disabled" tabindex="-1" aria-disabled="true">Data Klasifikasi Surat</a>
    </div>
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <a href="{{ route('letype.create') }}" class="btn btn-primary">Tambah</a>
        </div>
        <div style="margin-left: 30%;">
            <a href="{{ route('letype.export-excel') }}" style="color: #153243; float:right" ><i class="fa-solid fa-file-export fa-xl" style="margin-right:5px"></i>Export  excel </a>
        </div>
        <br>
    </div>
    <br>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Surat</th>
                <th>Klasifikasi Surat</th>
                <th>Surat Tertaut</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($types as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['letter_code'] }}</td>
                    <td>{{ $item['name_type'] }}</td>
                    <td></td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('letype.edit', $item['id']) }}" class="btn btn-secondary me-3">Edit</a>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal-">
                    Hapus
                </button>
            </td>
        </tr>
            <div class="modal fade" id="exampleModal-" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pengelola Surat</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure?
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('letype.delete', $item['id']) }}"" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark">Hapus</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
@endsection