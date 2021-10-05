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
                    <li class="breadcrumb-item"><a href="/syllabus">Syllabus</a></li>
                        <li class="breadcrumb-item active">Add Syllabus</li>
                    </ol>
                </div>
                
                  <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('syllabus.index') }}"> Back</a>
                </div>
                <h4 class="page-title mt-3">Add New Syllabus</h4>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-8">
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
                <form action="{{ route('syllabus.store') }}" method="POST" enctype="multipart/form-data">
                   @csrf

                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Title</label>
                            <input type="text" name="title" class="form-control" required placeholder="Title"/>
                        </div>


                        <div class="form-group mb-0">
                            <label class="mb-2 mt-4">Class</label>
                            <div>
                            <select name="class" class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                
                                @foreach($SyllabusCls as $SyllabusClasses)
                                <option value="" disabled selected hidden>Select a class</option>
                                <option value="{{ $SyllabusClasses->class }}">{{ $SyllabusClasses->class }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                       

                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Section</label>
                            <div>
                            <select name="section" class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                @foreach($SyllabusCls as $SyllabusClasses)
                                <option value="" disabled selected hidden>Select a section</option>
                                <option value="{{ $SyllabusClasses->section }}">{{ $SyllabusClasses->section }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Subject</label>
                            <div>
                            <select name="subject" class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                @foreach($SyllabusSub as $SyllabusSubjects)
                                <option value="" disabled selected hidden>Select a subject</option>
                                <option value="{{ $SyllabusSubjects->subject }}">{{ $SyllabusSubjects->subject }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Upload Syllabus</label>
                            <input type="file" name="upload_syllabus" class="form-control" required />
                        </div>

    
                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Submit
                                </button>
                                <button type="reset"  class="btn btn-secondary waves-effect m-l-5">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

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