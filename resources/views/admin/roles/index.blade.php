@extends ('layouts.layout')

@section('title', 'Roles')
@push('head')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Role</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Seluruh Data Role</h6>
            </div>
            <div class="mr-4 ml-4 mt-4 mb-0">
                @include('layouts.feedback')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Role</th>
                                <th>Akses Berita</th>
                                {{-- <th>Akses Menu</th> --}}
                                <th>Akses Tentang Kami</th>
                                {{-- <th>Akses Galeri Tentang Kami</th> --}}
                                <th>Akses User</th>
                                <th>Akses Role</th>
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
                                {{-- <th>Akses Menu</th> --}}
                                <th>Akses Tentang Kami</th>
                                {{-- <th>Akses Galeri Tentang Kami</th> --}}
                                <th>Akses User</th>
                                <th>Akses Role</th>
                                <th>Akses Slider Galeri</th>
                                <th>Akses Galeri</th>
                                <th>Akses Kontak</th>
                                <th>Akses Bisnis Informasi</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>
                                    <span class="badge badge-{{ $role->news_access ? 'success' : 'danger' }}">
                                        {{ $role->news_access ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $role->about_us_access ? 'success' : 'danger' }}">
                                        {{ $role->about_us_access ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $role->users_access ? 'success' : 'danger' }}">
                                        {{ $role->users_access ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $role->role_access ? 'success' : 'danger' }}">
                                        {{ $role->role_access ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $role->slider_gallery_access ? 'success' : 'danger' }}">
                                        {{ $role->slider_gallery_access ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $role->gallery_access ? 'success' : 'danger' }}">
                                        {{ $role->gallery_access ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $role->contact_access ? 'success' : 'danger' }}">
                                        {{ $role->contact_access ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $role->business_information_access ? 'success' : 'danger' }}">
                                        {{ $role->business_information_access ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></a>
                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></button>
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