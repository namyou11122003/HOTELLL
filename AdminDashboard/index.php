


<?php include "./pages/header.php";
include "./pages/navbar.php";

?>
<!-- Sidebar -->

<!-- Main Content -->


<!-- Charts Row -->
<!--  -->

<?php include "./pages/footer.php"; ?>

<!--   <script>
        // Bar Chart
        const barCtx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        label: 'Lorem ipsum',
                        data: [65, 45, 75, 35, 60, 50, 70, 30, 55, 40, 65, 50],
                        backgroundColor: '#1a3c5e',
                        borderRadius: 5
                    },
                    {
                        label: 'Dolor amet',
                        data: [40, 30, 60, 25, 45, 35, 55, 20, 40, 30, 45, 35],
                        backgroundColor: '#ffab00',
                        borderRadius: 5
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f0f0f0'
                        },
                        ticks: {
                            stepSize: 20
                        }
                    }
                }
            }
        });

        // Donut Chart
        const donutCtx = document.getElementById('donutChart').getContext('2d');
        const donutChart = new Chart(donutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'Remaining'],
                datasets: [{
                    data: [45, 55],
                    backgroundColor: ['#ffab00', '#e9ecef'],
                    borderWidth: 0,
                    cutout: '75%'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: false
                    }
                }
            }
        });

        // Area Chart
        const areaCtx = document.getElementById('areaChart').getContext('2d');
        const areaChart = new Chart(areaCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        label: 'Lorem ipsum',
                        data: [30, 45, 35, 60, 45, 70, 60, 65, 50, 65, 55, 70],
                        borderColor: '#ffab00',
                        backgroundColor: 'rgba(255, 171, 0, 0.2)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Dolor amet',
                        data: [20, 35, 25, 45, 30, 55, 40, 50, 35, 45, 40, 50],
                        borderColor: '#1a3c5e',
                        backgroundColor: 'rgba(26, 60, 94, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f0f0f0'
                        },
                        ticks: {
                            stepSize: 20
                        }
                    }
                }
            }
        });
    </script> -->