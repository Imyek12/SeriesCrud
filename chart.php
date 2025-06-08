<?php
include 'connect.php';


$sql = "SELECT gender, COUNT(*) AS count FROM seriescrud GROUP BY gender";
$result = mysqli_query($con, $sql);
$genderLabels = [];
$genderCounts = [];
while ($row = mysqli_fetch_assoc($result)) {
    $genderLabels[] = ucfirst($row['gender']); 
    $genderCounts[] = $row['count'];
}

$sql = "SELECT place, COUNT(*) AS count FROM seriescrud GROUP BY place";
$result = mysqli_query($con, $sql);

$placeLabels = [];
$placeCounts = [];

while ($row = mysqli_fetch_assoc($result)) {
    $placeLabels[] = ucwords($row['place']);
    $placeCounts[] = $row['count'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Pie Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <style>
        body {
            background-color: gray;
            font-family: Arial, sans-serif;
            text-align: left;
        }
        .chart-container {
            width: 45%;
            float: left;
            margin: 2rem;
        }
         div {
  background-color: white;
     }
        h2 {
            margin-bottom: 1rem;
        }
        
    </style>
</head>
<body>

    <div class="chart-container">
        <h2>Gender: </h2>
        <canvas id="genderChart"></canvas>
        
    </div>

    <div class="chart-container">
        <h2>Place: </h2>
        <canvas id="placeChart"></canvas>
    </div>

    <script>
       
        Chart.register(ChartDataLabels);

     const genderCtx = document.getElementById('genderChart').getContext('2d');
        new Chart(genderCtx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($genderLabels); ?>,
                datasets: [{
                    data: <?php echo json_encode($genderCounts); ?>,
                    backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56', '#4bc0c0']
                }]
            },
            
            options: {
                plugins: {
                    datalabels: {
                         formatter: (value, context) => {
                            const data = context.chart.data.datasets[0].data.map(v => Number(v));
                            const total = data.reduce((a, b) => a + b, 0);
                            const percentage = ((Number(value) / total) * 100);
                            return percentage.toFixed(1) + "%";
                        },

                        color: '#fff',
                        font: {
                            weight: 'bold',
                            size: 14
                        }
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        
        const placeCtx = document.getElementById('placeChart').getContext('2d');
        new Chart(placeCtx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($placeLabels); ?>,
                datasets: [{
                    data: <?php echo json_encode($placeCounts); ?>,
                    backgroundColor: ['blue', 'red', 'lightgreen', 'yellow', 'violet']
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                       formatter: (value, context) => {
                            const data = context.chart.data.datasets[0].data.map(v => Number(v));
                            const total = data.reduce((a, b) => a + b, 0);
                            const percentage = ((Number(value) / total) * 100);
                            return percentage.toFixed(1) + "%";
                        },

                        color: '#fff',
                        font: {
                            weight: 'bold',
                            size: 14
                        }
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</body>
</html>