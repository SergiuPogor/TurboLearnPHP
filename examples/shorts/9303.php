<?php

// Example 1: Using Chart.js with PHP to create dynamic charts
// Assuming data is fetched from a database or API
$data = [
    'labels' => ['January', 'February', 'March', 'April'],
    'datasets' => [
        [
            'label' => 'Sales',
            'data' => [1500, 2000, 1800, 2200],
            'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
            'borderColor' => 'rgba(54, 162, 235, 1)',
            'borderWidth' => 1
        ]
    ]
];

// JSON encode data for JavaScript use
$jsonData = json_encode($data);
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="myChart" width="400" height="200"></canvas>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const chartData = <?php echo $jsonData; ?>;
    new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

<?php
// Example 2: Using Image_GraphViz for creating a graph visualization in PHP

require_once 'Image/GraphViz.php';

$graph = new Image_GraphViz();
$graph->addNode('Start');
$graph->addNode('Middle');
$graph->addNode('End');
$graph->addEdge(['Start' => 'Middle', 'Middle' => 'End']);

// Render the graph as an image
$graph->image();
?>