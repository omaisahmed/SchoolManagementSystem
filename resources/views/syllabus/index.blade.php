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
                                                <li class="breadcrumb-item active"><a href="/syllabus">Syllabus</a></li>
                                                
                                            </ol>
                                        </div>
                                        
                                        <div class="pull-left">
                                          <a class="btn btn-primary" href="{{ route('syllabus.create') }}"><i class="fa fa-plus"> Add Syllabus</i></a>
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
                                                    <th class="Bold">Title</th>
                                                    <th class="Bold">Class</th>
                                                    <th class="Bold">Section</th>
                                                    <th class="Bold">Subject</th>
                                                    <th class="Bold">Upload Syllabus</th>
                                                    <th class="Bold">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach ($syllabuses as $syllabus)
                                                      
                                                            <tr>
                                                            
                                                                <td>{{ ++$i }}</td>
                                                                <td>{{ $syllabus->title }}</td>
                                                                <td>{{ $syllabus->class }}</td>
                                                                <td>{{ $syllabus->section}}</td>
                                                                <td>{{ $syllabus->subject}}</td>
                                                                <td>{{ $syllabus->upload_syllabus }}</td>
                                                                
                                                                <td><form action="{{ route('syllabus.destroy',$syllabus->id) }}" method="POST">
                                                                <a class="btn btn-primary" href="{{ route('syllabus.edit',$syllabus->id) }}">Edit</a>
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                        </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                   
                                                    </tbody>
                                                </table>

                                            {{ $syllabuses->links() }}
                                            

                                          
            
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