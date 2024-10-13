@extends('layouts.admin')
@section('title',__('Dashboard'))
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-box2 icon-gradient bg-plum-plate"></i>
                </div>
                <div>
                    {{ __('Welcome') }} {{ Auth::user()->name }}, {{ __('to MindQuilo') }}
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Key Stats Section -->
        <div class="row my-4">
            <!-- Dynamic Active Clients Count -->
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3 shadow-sm" style="border-radius: 10px;">
                    <div class="card-body">
                        <h3 class="card-text">50+</h3>  <!-- Real data passed from the controller -->
                        <p class="card-text">Active Clients</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3 shadow-sm" style="border-radius: 10px;">
                    <div class="card-body">
                        <h3 class="card-text">100+</h3>
                        <p class="card-text">Cups of Coffee</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3 shadow-sm" style="border-radius: 10px;">
                    <div class="card-body">
                        <h3 class="card-text">15+</h3>
                        <p class="card-text">Rewards Earned</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info mb-3 shadow-sm" style="border-radius: 10px;">
                    <div class="card-body">
                        <h3 class="card-text">1</h3>
                        <p class="card-text">Countries Covered</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner Image -->
        <div class="banner my-4 shadow-sm" style="border-radius: 10px;">
            <img src="{{ asset('view/img/slider/333.jpg') }}" class="img-fluid" alt="Banner" style="border-radius: 10px;">
        </div>

        <!-- Charts Section -->
        <div class="row my-4">
            <!-- Bar Chart (on the left) -->
            <div class="col-md-6 shadow-sm mb-4" style="border: 1px solid #e0e0e0; border-radius: 10px; padding: 30px;">
                <h5 class="text-center">User Bar Chart</h5>
                <canvas id="barChart"></canvas>
            </div>

            <!-- Pie Chart (on the right) -->
            <div class="col-md-6 shadow-sm mb-4" style="border: 1px solid #e0e0e0; border-radius: 10px; padding: 30px;">
                <h5 class="text-center">Users vs Doctors Pie Chart</h5>
                <canvas id="pieChart"></canvas>
            </div>
        </div>

        <!-- Line Graph (Below) -->
        <div class="row my-4">
            <div class="col-md-12 shadow-sm" style="border: 1px solid #e0e0e0; border-radius: 10px; padding: 30px;">
                <h5 class="text-center">Recent Feedback Line Graph</h5>
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Bar chart for Sales
    var ctxBar = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Sales',
                data: [120, 150, 180, 220, 250, 300],
                backgroundColor: '#4CAF50',
                borderColor: '#388E3C',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Pie chart for Product vs Services
    var ctxPie = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ['Users', 'Doctors'],
            datasets: [{
                data: [60, 40],
                backgroundColor: ['#FF6384', '#36A2EB'],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true
        }
    });

    // Line chart for Recent Reports
    var ctxLine = document.getElementById('lineChart').getContext('2d');
    var lineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Doctors',
                data: [50, 75, 100, 125, 150, 175],
                borderColor: '#4CAF50',
                fill: true,
                backgroundColor: 'rgba(76, 175, 80, 0.2)',
            }, {
                label: 'Users',
                data: [70, 85, 110, 140, 170, 200],
                borderColor: '#2196F3',
                fill: true,
                backgroundColor: 'rgba(33, 150, 243, 0.2)',
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
