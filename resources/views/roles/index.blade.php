@extends ('layouts.layout')

@section('title', 'Roles')
@push('head')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Role</th>
                                <th>Akses Berita</th>
                                <th>Akses Menu</th>
                                <th>Akses Tentang Kami</th>
                                <th>Akses Galeri Tentang Kami</th>
                                <th>Akses User</th>
                                <th>Akses Slider Galeri</th>
                                <th>Akses Galeri</th>
                                <th>Akses Kontak</th>
                                <th>Akses Bisnis Informasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Role</th>
                                <th>Akses Berita</th>
                                <th>Akses Menu</th>
                                <th>Akses Tentang Kami</th>
                                <th>Akses Galeri Tentang Kami</th>
                                <th>Akses User</th>
                                <th>Akses Slider Galeri</th>
                                <th>Akses Galeri</th>
                                <th>Akses Kontak</th>
                                <th>Akses Bisnis Informasi</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <tr>
                                <td>Praja</td>
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
                                </td>
                            </tr>
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