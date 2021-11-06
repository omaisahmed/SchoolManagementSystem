<x-app-layout>

    <!-- Start right Content here -->
    
                <div class="content-page">
                    <!-- Start content -->
                    <div class="content">
    
                    @include('partials.navigation')

    <div class="page-content-wrapper ">

                        <div class="container-fluid">

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
                                                @foreach ($attendences as $attendence)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $attendence->name }}</td>
                                                        <td>{{ $attendence->status }}</td>  
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
                            </div><!-- end row -->
            
                          
                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                @include('partials.footer')

            </div>
            <!-- End Right content here -->
          
</x-app-layout>