<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS | Users</title>

    @include('partial.csimports')

</head>

<body id="page-top">
    <div id="wrapper">
        @include('partial.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('partial.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User Section</h1>
        
        
    
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <a href="#" class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#createmodal"><i
                                    class="fas fa-plus fa-sm text-white-50"></i> Add User</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>
                                            <th>Contact Number</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DATA HERE -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->
            </div>

            @include('partial.footer')
        </div>
    </div>
    
    @include('partial.scrolltotop')
    @include('partial.createmodal')
    @include('partial.jsimports')
    @include('partial.js_users')
</body>
</html>