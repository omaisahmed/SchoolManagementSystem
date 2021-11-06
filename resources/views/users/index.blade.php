<x-app-layout>

    <!-- Start right Content here -->
    
                <div class="content-page">
                    <!-- Start content -->
                    <div class="content">
    
                    @include('partials.navigation')

    <div class="page-content-wrapper ">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="btn-group float-right">
                                            <ol class="breadcrumb hide-phone p-0 m-0">
                                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="/users">Users</a></li>
                                                
                                            </ol>
                                        </div>
                                        
                                        <div class="pull-left">
                                          <a class="btn btn-primary" href="{{ route('users.create') }}"><i class="fa fa-plus"> Add User</i></a>
                                          <a class="btn btn-success iebtn" href="{{ route('export') }}"><i class="fa fa-download"></i> Export User Data</a> 
                                          <a class="btn btn-success iebtn" data-toggle="modal" data-target="#importModal" style="color: white;"><i class="fa fa-upload"></i> Import User Data</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- end page title end breadcrumb -->

            
                                            <!-- Modal -->
                                            <div class="modal fade" id="importModal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Import User Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <div class="row">
                                                                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf 
                                                                <div class="col-md-6">
                                                               
                                                                    <div class="form-group">
                                                                        <label for="field-1" class="control-label">Upload File</label>
                                                                        <input type="file" name="file" class="form-control" id="field-1" placeholder="Import File">
                                                                    </div>
                                                                </div>
                                                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Upload</button>
                                                        </div>
                                                     </form>
                                                    </div>
                                                </div>

                                            </div>                                  
                                        </div>
                                  </div>
                              
                                    






                         

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                        @if ($message = Session::get('success'))
                                          <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                          </div>
                                        @endif

                                            <table class="table" id="my-table">
                                                <thead>
                                                    <tr>
                                                    <th class="Bold">No</th>
                                                    <th class="Bold">Name</th>
                                                    <th class="Bold">Email</th>
                                                    <th class="Bold">Password</th>
                                                    <th class="Bold">Role</th>
                                                    <th class="Bold">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email}}</td>
                                                        <td>{{ bcrypt($user->password)}}</td>
                                                        <td>{{ $user->role }}</td>
                                                        <td><form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                          <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            @endforeach
                                                   
                                                </tbody>
                                            </table>

                                            {{ $users->links() }}

                                          
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
            
                          
                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                @include('partials.footer')

            </div>
            <!-- End Right content here -->
          
</x-app-layout>