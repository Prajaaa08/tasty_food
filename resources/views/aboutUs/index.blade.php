@extends ('layouts.layout')

@section('title', 'Users')
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
                <h6 class="m-0 font-weight-bold text-primary">Seluruh Konten Tentang Kami</h6>
            </div>
            <div class="mr-4 ml-4 mt-4 mb-0">
                @include('layouts.feedback')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Foto Kanan</th>
                                <th>Foto Kiri</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Posisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Foto Kanan</th>
                                <th>Foto Kiri</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Posisi</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($aboutUs as $about)
                                <tr>
                                    <td>
                                        @if($about->photo_kanan)
                                            <img src="{{ asset('storage/' . $about->photo_kanan) }}" alt="Foto Kanan" class="img-fluid" style="max-width: 100px;">
                                        @else
                                            <img src="{{ asset('assets/img/no-image.png') }}" alt="No Image" class="img-fluid" style="max-width: 100px;">
                                        @endif
                                    </td>
                                    <td>
                                        @if($about->photo_kiri)
                                            <img src="{{ asset('storage/' . $about->photo_kiri) }}" alt="Foto Kiri" class="img-fluid" style="max-width: 100px;">
                                        @else
                                            <img src="{{ asset('assets/img/no-image.png') }}" alt="No Image" class="img-fluid" style="max-width: 100px;">
                                        @endif
                                    </td>
                                    <td>{{ $about->title }}</td>
                                    <td>{{ $about->content }}</td>
                                    <td>
                                        @if($about->position == 'atas')
                                            <span class="badge badge-primary">Atas</span>
                                        @elseif($about->position == 'tengah')
                                            <span class="badge badge-success">Tengah</span>
                                        @elseif($about->position == 'bawah')
                                            <span class="badge badge-info">Bawah</span>
                                        @else
                                            <span class="badge badge-secondary">{{ ucfirst($about->position) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('aboutUs.edit', $about->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></a>
                                        <form action="{{ route('aboutUs.destroy', $about->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Deskripsi Ini?')"><i class="fa-solid fa-trash"></i></button>
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