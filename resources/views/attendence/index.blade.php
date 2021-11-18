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
                                                <li class="breadcrumb-item active"><a href="/attendence">Attendence</a></li>
                                                
                                            </ol>
                                        </div>
                                        
                                        <div class="pull-left">
                                          <a class="btn btn-primary" href="{{ route('attendence.create') }}"><i class="fa fa-plus"> Add Attendence</i></a>
                                         </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <!-- Search Item-->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">

 @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form action="{{ route('attendence.search') }}" method="POST" role="search">
                   @csrf
     
                                        <div class="form-group mb-0" style="display:flex;">

                                        <div class="col-md-3">
                                        <label class="my-2 py-1">Class</label>
                                        <div>
                                        <select name="class" class="select2 form-control mb-3 custom-select">
                                                <option selected>Select</option>
                                                @foreach($ClassAttd as $ClassAttds)
                                                 <option value="{{ $ClassAttds->class }}">{{ $ClassAttds->class }}</option>
                                                 @endforeach
                                        </select>

                                       
                                        </div>
                                        </div>

                                        
                                        <div class="col-md-3">
                                        <label class="my-2 py-1">Section</label>
                                        <div>
                                        <select name="section" class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                          @foreach($ClassAttd as $ClassAttds)
                                            <option value="{{ $ClassAttds->section }}">{{ $ClassAttds->section }}</option>
                                          @endforeach
                                        </select>
                                        </div>
                                        </div>

                                        <div class="col-md-3">
                                        <label class="my-2 py-1">Date</label>
                                        <div>
                                        <input class="form-control" type="date" placeholder="mm/dd/yyyy" id="datepicker-autoclose" >
                                        </div>
                                        </div>

                                        <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary mt-5">Show Students</button>
                                        </div>


                                              </div>
                                           </form>
                                        </div>      
                                    </div>
                                </div>
                            </div>
                            <!-- Search Item-->




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

                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th class="Bold">No</th>
                                                    <th class="Bold">Name</th>
                                                    <th class="Bold">Status</th>
                                                    <th class="Bold">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($stds as $std)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $std->name }}</td>
                                                        <td>{{ $std->status }}</td>  
                                                        <td><form action="{{ route('attendence.destroy',$attendence->id) }}" method="POST">
                                                          <a class="btn btn-primary" href="{{ route('attendence.edit',$attendence->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            </tr>
                                            @endforeach
                                                   
                                                </tbody>
                                            </table>

                                            {{ $attendences->links() }}

                                          
            
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <!--End Row-->
            
                          
                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                @include('partials.footer')

            </div>
            <!-- End Right content here -->
          
</x-app-layout>