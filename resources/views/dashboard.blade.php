<x-app-layout>
    <div class="content-page">
                <div class="content">

                @include('partials.navigation')

                    <div class="page-content-wrapper pb-4">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="btn-group float-right">
                                            <ol class="breadcrumb hide-phone p-0 m-0">
                                                <li class="breadcrumb-item"><a href="/">SMS</a></li>
                                                <li class="breadcrumb-item active">Dashboard</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Dashboard</h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="container-fluid">
                                <!-- Dashboard Header -->
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <div class="card bg-primary text-white">
                                            <div class="card-body">
                                                <h5>Total Students</h5>
                                                <h3>{{ $totalStudents ?? '' }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-success text-white">
                                            <div class="card-body">
                                                <h5>Total Teachers</h5>
                                                <h3>{{ $totalTeachers ?? '' }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-warning text-white">
                                            <div class="card-body">
                                                <h5>Classes</h5>
                                                <h3>{{ $totalClasses ?? '' }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-danger text-white">
                                            <div class="card-body">
                                                <h5>Departments</h5>
                                                <h3>{{ $totalDepartments ?? '' }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Analytics and Listings -->
                                <div class="row">
                                    <!-- Analytics Chart -->
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Students Enrollment Over Time</h5>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="enrollmentChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <!-- Calendar -->
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Calendar</h5>
                                            </div>
                                            <div class="card-body">
                                                <div id="calendar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Students and Teachers List -->
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Recent Students</h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Grade</th>
                                                            <th>Enrollment Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($recentStudents ?? [] as $student)
                                                        <tr>
                                                            <td>{{ $student->name ?? '' }}</td>
                                                            <td>{{ $student->grade ?? '' }}</td>
                                                            <td>{{ $student->enrollment_date ?? '' }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Recent Teachers</h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Subject</th>
                                                            <th>Joining Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($recentTeachers ?? [] as $teacher)
                                                        <tr>
                                                            <td>{{ $teacher->name ?? '' }}</td>
                                                            <td>{{ $teacher->subject ?? '' }}</td>
                                                            <td>{{ $teacher->joining_date ?? '' }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Include Chart.js -->
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                                var ctx = document.getElementById('enrollmentChart').getContext('2d');
                                var enrollmentChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: @json($enrollmentChartLabels ?? ''),
                                        datasets: [{
                                            label: 'Enrollment',
                                            data: @json($enrollmentChartData ?? ''),
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 2,
                                            fill: false
                                        }]
                                    },
                                    options: {
                                        responsive: true
                                    }
                                });
                            </script>
                      
                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                @include('partials.footer')

            </div>
</x-app-layout>


