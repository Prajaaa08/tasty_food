<!DOCTYPE html>
<html lang="en">
@include('templates.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('templates.sidebar')
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('templates.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
            
                    @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            @include('templates.footer')
        </div>
    </div>
    @include('templates.script')

</body>

</html>
