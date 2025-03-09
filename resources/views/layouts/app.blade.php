<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="medical, management, dashboard, admin template">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    function preLoaderHandler(){
      $('.pre_loader').hide();
    }
  </script>
  <link rel="apple-touch-icon" sizes="180x180" href="../../assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="../../assets/favicon/site.webmanifest">

  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/device-list.css">
  <link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" />
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
  
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>		

  
    <title>MedManager - Medical Office Management System</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        .bg-primary {
            background-color: #1e40af;
        }
        .bg-side-nav {
            background-color: #f1f5f9;
        }
        .text-primary {
            color: #1e40af;
        }
        .border-primary {
            border-color: #1e40af;
        }
        .stat-card {
            transition: all 0.3s ease;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .sidebar-item {
            transition: all 0.2s ease;
            border-radius: 0.5rem;
            margin: 0.25rem 0.5rem;
        }
        .sidebar-item:hover {
            background-color: #e2e8f0;
        }
        .sidebar-active {
            background-color: rgba(30, 64, 175, 0.1);
            border-left: 4px solid #1e40af;
        }
        .calendar-day {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .calendar-day:hover {
            background-color: #e2e8f0;
        }
        .calendar-day.active {
            background-color: #1e40af;
            color: white;
        }
        .calendar-day.has-event {
            border: 2px solid #1e40af;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
        }
        @media (max-width: 1024px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }
        .chart-container {
            position: relative;
            width: 100%;
            height: 300px;
        }
        .profile-card {
            border-radius: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>

<body>
    <!-- Container -->
    <div class="mx-auto">
        <div class="min-h-screen flex flex-col">
            <!-- Header Section -->
            @include('components.navbar')

            <div class="flex flex-1 bg">
                <!-- Sidebar -->
                @include('components.sidebar')

                <!-- Main -->
                <main class="bg-white flex-1 p-6 overflow-hidden">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <script>
        // Sidebar Toggle
        function sidebarToggle() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        }

        // Profile Dropdown Toggle
        function profileToggle() {
            const profileDropdown = document.getElementById('ProfileDropDown');
            profileDropdown.classList.toggle('hidden');
        }

        // Initialize Patient Visits Chart
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('patientsChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Patient Visits',
                        data: [380, 420, 390, 450, 480, 520],
                        backgroundColor: 'rgba(30, 64, 175, 0.1)',
                        borderColor: 'rgba(30, 64, 175, 1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true,
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>