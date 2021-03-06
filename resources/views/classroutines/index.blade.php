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
                                                <li class="breadcrumb-item active"><a href="/classroutine">Class Routine</a></li>
                                                
                                            </ol>
                                        </div>
                                        
                                        <div class="pull-left">
                                          <a class="btn btn-primary" href="{{ route('classroutine.create') }}"><i class="fa fa-plus"> Add Class Routine</i></a>
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
                                                    <th class="Bold">Class</th>
                                                    <th class="Bold">Section</th>
                                                    <th class="Bold">Subject</th>
                                                    <th class="Bold">Teacher</th>
                                                    <th class="Bold">Class Room</th>
                                                    <th class="Bold">Day</th>
                                                    <th class="Bold">Starting Hour</th>
                                                    <th class="Bold">Ending Hour</th>
                                                    <th class="Bold">Starting Minute</th>
                                                    <th class="Bold">Ending Minute</th>
                                                    <th class="Bold">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach ($classroutines as $classroutine)
                                                      
                                                            <tr>
                                                            
                                                                <td>{{ ++$i }}</td>
                                                                <td>{{ $classroutine->class }}</td>
                                                                <td>{{ $classroutine->section}}</td>
                                                                <td>{{ $classroutine->subject}}</td>
                                                                <td>{{ $classroutine->teacher }}</td>
                                                                <td>{{ $classroutine->classroom }}</td>
                                                                <td>{{ $classroutine->day }}</td>
                                                                <td>{{ $classroutine->starting_hour }}</td>
                                                                <td>{{ $classroutine->ending_hour }}</td>
                                                                <td>{{ $classroutine->starting_minute }}</td>
                                                                <td>{{ $classroutine->ending_minute }}</td>
                                                                <td><form action="{{ route('classroutine.destroy',$classroutine->id) }}" method="POST">
                                                                <a class="btn btn-primary" href="{{ route('classroutine.edit',$classroutine->id) }}">Edit</a>
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                        </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                   
                                                    </tbody>
                                                </table>

                                            {{ $classroutines->links() }}
                                            

                                          
            
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