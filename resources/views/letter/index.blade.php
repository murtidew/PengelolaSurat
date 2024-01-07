@extends('temp.template')

@section('nav')

    @if(Session::get('success'))
        <div class="alert alert-success"> {{ Session::get('success') }} </div>
    @endif

    @if(Session::get('deleted'))
        <div class="alert alert-warning"> {{ Session::get('deleted') }} </div>
    @endif
    <div class="justify-content-end d-flex">
        <a href="{{ route('letter.create') }}" class="btn btn-primary" style="margin-top: 1em">Tambah</a>
    </div>{{-- <button type="submit" href="#" class="btn btn-secondary">Tambah Pengguna</button> --}}
    <br>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Perihal</th>
                <th>Tanggal Keluar</th>
                <th>Penerima Surat</th>
                <th>Notulis</th>
                <th>Hasil Rapat</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($letters as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ ucwords($item['letter_type_id']) }}</td>
                    <td>{{ ucwords($item['letter_perihal']) }}</td>
                    <td>{{ ucwords($item['letter_perihal']) }}</td>
                    <td>{{-- ucwords($item['role']) --}}</td>
                    <td>{{-- ucwords($item['role']) --}}</td>
                    <td>{{ ucwords($item['notulis']) }}</td>
                    <td>{{-- ucwords($item['notulis']) --}}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('order.staff.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal-{{ $item['id']}}">Hapus</button>
                    </td>
                </tr>  
                
        <div class="modal fade" id="confirmDeleteModal-{{ $item['id']}}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="confirmDeleteModalLabel">Konfirmasi hapus</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Yakin ingin menghapus data ini?
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('letter.destroy', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
@endsection