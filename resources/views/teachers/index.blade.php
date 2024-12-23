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
                                                <li class="breadcrumb-item active"><a href="/teachers">Teachers</a></li>
                                                
                                            </ol>
                                        </div>
                                        
                                        <div class="pull-left">
                                          <a class="btn btn-primary" href="{{ route('teachers.create') }}"><i class="fa fa-plus"> Add Teacher</i></a>
                                         </div>

                                         


                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- end page title end breadcrumb -->
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
                                                    <th class="Bold">Image</th>
                                                    <th class="Bold">Name</th>
                                                    <th class="Bold">Email</th>
                                                    <th class="Bold">Designation</th>
                                                    <th class="Bold">Department</th>
                                                    <th class="Bold">Phone</th>
                                                    <th class="Bold">Gender</th>
                                                    <th class="Bold">DOB</th>
                                                    <th class="Bold">Address</th>
                                                    <th class="Bold">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach ($teachers as $teacher)
                                                      
                                                            <tr>
                                                            
                                                                <td>{{ ++$i }}</td>
                                                                <th><img src="/images/teachers/{{ $teacher->image }}" width="70" class="img-responsive rounded-circle" /></th>
                                                                <td>{{ $teacher->name }}</td>
                                                                <td>{{ $teacher->email}}</td>
                                                                <td>{{ $teacher->designation }}</td>
                                                                <td>{{ $teacher->department }}</td>
                                                                <td>{{ $teacher->phone }}</td>
                                                                <td>{{ $teacher->gender }}</td>
                                                                <td>{{ $teacher->dob }}</td>
                                                                <td>{{ $teacher->address }}</td>
                                                                <td><form action="{{ route('teachers.destroy',$teacher->id) }}" method="POST">
                                                                <a class="btn btn-primary" href="{{ route('teachers.edit',$teacher->id) }}">Edit</a>
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                        </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                   
                                                    </tbody>
                                                </table>

                                            {{ $teachers->links() }}
                                            

                                          
            
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