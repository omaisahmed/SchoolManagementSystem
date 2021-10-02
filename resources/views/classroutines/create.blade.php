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
                    <li class="breadcrumb-item"><a href="/classroutine">Class Routine</a></li>
                        <li class="breadcrumb-item active">Add Class Routine</li>
                    </ol>
                </div>
                
                  <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('classroutine.index') }}"> Back</a>
                </div>
                <h4 class="page-title mt-3">Add New Class Routine</h4>
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
                <form action="{{ route('classroutine.store') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                        <div class="form-group mb-0">
                            <label class="mb-2 pb-1">Class</label>
                            <div>
                            <select name="class" class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                
                                @foreach($ClassRoutClass as $ClassRoutClasses)
                                <option value="" disabled selected hidden>Select a class</option>
                                <option value="{{ $ClassRoutClasses->class }}">{{ $ClassRoutClasses->class }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                       

                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Section</label>
                            <div>
                            <select name="section" class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                @foreach($ClassRoutClass as $ClassRoutClasses)
                                <option value="" disabled selected hidden>Select a section</option>
                                <option value="{{ $ClassRoutClasses->section }}">{{ $ClassRoutClasses->section }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Subject</label>
                            <div>
                            <select name="subject" class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                @foreach($ClassRoutSub as $ClassRoutSubjects)
                                <option value="" disabled selected hidden>Select a subject</option>
                                <option value="{{ $ClassRoutSubjects->subject }}">{{ $ClassRoutSubjects->subject }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>


                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Teacher</label>
                            <div>
                            <select name="teacher" class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                @foreach($ClassRoutTeach as $ClassRoutTeachers)
                                <option value="" disabled selected hidden>Select a teacher</option>
                                <option value="{{ $ClassRoutTeachers->name }}">{{ $ClassRoutTeachers->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>


                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Class Room</label>
                            <div>
                            <select name="classroom" class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                @foreach($ClassRoutClassroom as $ClassRoutClassrooms)
                                <option value="" disabled selected hidden>Select a class room</option>
                                <option value="{{ $ClassRoutClassrooms->classroom_name }}">{{ $ClassRoutClassrooms->classroom_name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group mb-0">     
                            <label class="my-2 py-1">Day</label>
                            <div>
                            <select name="day" class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                               <option value="" disabled selected hidden>Select a day</option>
                               <option>Saturday</option>
                               <option>Sunday</option>
                               <option>Monday</option>
                               <option>Tuesday</option>
                               <option>Wednesday</option>
                               <option>Thursday</option>
                               <option>Friday</option>
                            </select>
                            </div>
                        </div>


                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Starting Hour</label>
                            <div>
                            <select name="starting_hour" class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                               <option value="" disabled selected hidden>Starting Hour</option>
                               <option>12 AM</option>
                               <option>1 AM</option>
                               <option>2 AM</option>
                               <option>3 AM</option>
                               <option>4 AM</option>
                               <option>5 AM</option>
                               <option>6 AM</option>
                               <option>7 AM</option>
                               <option>8 AM</option>
                               <option>9 AM</option>
                               <option>10 AM</option>
                               <option>11 AM</option>
                               <option>12 PM</option>
                               <option>1 PM</option>
                               <option>2 PM</option>
                               <option>3 PM</option>
                               <option>4 PM</option>
                               <option>5 PM</option>
                               <option>6 PM</option>
                               <option>7 PM</option>
                               <option>8 PM</option>
                               <option>9 PM</option>
                               <option>10 PM</option>
                               <option>11 PM</option>
                            </select>
                            </div>
                        </div>


                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Ending Hour</label>
                            <div>
                            <select name="ending_hour" class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                               <option value="" disabled selected hidden>Ending Hour</option>
                               <option>12 AM</option>
                               <option>1 AM</option>
                               <option>2 AM</option>
                               <option>3 AM</option>
                               <option>4 AM</option>
                               <option>5 AM</option>
                               <option>6 AM</option>
                               <option>7 AM</option>
                               <option>8 AM</option>
                               <option>9 AM</option>
                               <option>10 AM</option>
                               <option>11 AM</option>
                               <option>12 PM</option>
                               <option>1 PM</option>
                               <option>2 PM</option>
                               <option>3 PM</option>
                               <option>4 PM</option>
                               <option>5 PM</option>
                               <option>6 PM</option>
                               <option>7 PM</option>
                               <option>8 PM</option>
                               <option>9 PM</option>
                               <option>10 PM</option>
                               <option>11 PM</option>
                            </select>
                            </div>
                        </div>


                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Starting Minute</label>
                            <div>
                            <select name="starting_minute" class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                               <option value="" disabled selected hidden>Starting Minute</option>
                               <option>0</option>
                               <option>5</option>
                               <option>10</option>
                               <option>15</option>
                               <option>20</option>
                               <option>25</option>
                               <option>30</option>
                               <option>35</option>
                               <option>40</option>
                               <option>45</option>
                               <option>50</option>
                               <option>55</option>
                            </select>
                            </div>
                        </div>


                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Ending Minute</label>
                            <div>
                            <select name="ending_minute" class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                               <option value="" disabled selected hidden>Ending Minute</option>
                               <option>0</option>
                               <option>5</option>
                               <option>10</option>
                               <option>15</option>
                               <option>20</option>
                               <option>25</option>
                               <option>30</option>
                               <option>35</option>
                               <option>40</option>
                               <option>45</option>
                               <option>50</option>
                               <option>55</option>
                            </select>
                            </div>
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