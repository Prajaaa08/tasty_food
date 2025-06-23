@extends ('layouts.layout')

@section('title', 'Foto Galeri')
@push('head')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Galeri</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Seluruh Data Foto Galeri</h6>
            </div>
            <div class="mr-4 ml-4 mt-4 mb-0">
                @include('layouts.feedback')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Photo</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ( $gallerys as $gallery )
                                <tr>
                                    <td>
                                        @if ($gallery->photo)
                                            <img src="{{ asset('storage/' . $gallery->photo) }}" width="150">
                                        @else
                                            <img src="{{ asset('assets/img/no-image.png') }}" width="50">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.gallerys.edit', $gallery->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></a>
                                        <form action="{{ route('admin.gallerys.destroy', $gallery->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Menu Ini?')"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                                {{-- <td>Praja</td>
                                <td><span class="badge badge-danger">No</span></td>
                                <td><span class="badge badge-success">Yes</span></td>
                                <td><span class="badge badge-danger">No</span></td>
                                <td><span class="badge badge-success">Yes</span></td>
                                <td><span class="badge badge-success">Yes</span></td>
                                <td><span class="badge badge-danger">No</span></td>
                                <td><span class="badge badge-danger">No</span></td>
                                <td><span class="badge badge-success">Yes</span></td>
                                <td><span class="badge badge-danger">No</span></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="#" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    @endsection
    @push('scripts')
        <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
    @endpush