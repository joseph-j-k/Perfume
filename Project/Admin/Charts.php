<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");


$xValues = [];
$yValues = [];

// Fetch category names
$selX = "SELECT * FROM tbl_category";
$resX = $conn->query($selX);
while ($dataX = $resX->fetch_assoc()) {
    $xValues[] = $dataX['category_name'];

    // Fetch sum of cart quantities for each category
    $selY = "SELECT SUM(cart_qty) as qty_sum 
             FROM tbl_cart c 
             INNER JOIN tbl_product p ON p.product_id = c.product_id 
             INNER JOIN tbl_subcategory s ON s.subcategory_id = p.subcategory_id 
             WHERE s.category_id = " . $dataX['category_id'] . " 
             AND cart_status BETWEEN 0 AND 5";
    $resY = $conn->query($selY);
    $dataY = $resY->fetch_assoc();
    $yValues[] = $dataY['qty_sum'] ? $dataY['qty_sum'] : 0; // Handle null values
}

// Encode PHP arrays to JSON for use in JavaScript
$xValuesJson = json_encode($xValues);
$yValuesJson = json_encode($yValues);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Quantity Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</head>
<body>
    <!-- Set a fixed size for the chart canvas -->
    <div style="width: 30%; height: 50%; margin: auto; margin-top:100px;">
        <canvas id="pieChart" width="500" height="500"></canvas>
    </div>

    <script>
        function generatePastelBrightColorPalettes(numColors) {
            const fillColors = [];
            const borderColors = [];
            const colorStep = 360 / numColors;
            for (let i = 0; i < numColors; i++) {
                const hue = Math.round(i * colorStep);
                const saturation = 50 + Math.random() * 30; 
                const lightness = 65 + Math.random() * 30;  
                const fillColor = `hsla(${hue}, ${saturation}%, ${lightness}%, 0.65)`;
                const borderColor = `hsla(${hue}, ${saturation}%, ${lightness}%, 1)`;
                fillColors.push(fillColor);
                borderColors.push(borderColor);
            }
            return { fillColors, borderColors };
        }

        $(function() {
            var xValues = <?php echo $xValuesJson; ?>;
            var yValues = <?php echo $yValuesJson; ?>;
            const { fillColors, borderColors } = generatePastelBrightColorPalettes(xValues.length);

            var doughnutPieData = {
                datasets: [{
                    data: yValues,
                    backgroundColor: fillColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }],
                labels: xValues,
            };

            var doughnutPieOptions = {
                responsive: true,
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                plugins: {
                    // Enable the datalabels plugin to show the percentage on the pie slices
                    datalabels: {
                        color: 'white',
                        formatter: (value, context) => {
                            const total = context.chart.data.datasets[0].data.reduce((acc, val) => acc + val, 0);
                            const percentage = (value / total * 100).toFixed(2) + '%';
                            return percentage;
                        },
                        font: {
                            weight: 'bolder'
                        }
                    }
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var dataset = data.datasets[tooltipItem.datasetIndex];
                            var total = dataset.data.reduce((accumulator, value) => accumulator + value, 0);
                            var value = dataset.data[tooltipItem.index];
                            var percentage = ((value / total) * 100).toFixed(2) + "% of Total";
                            return `${data.labels[tooltipItem.index]}: ${value} (${percentage})`;
                        }
                    }
                },
                legend: {
                    display: true,
                    position: 'bottom'
                }
            };

            if ($("#pieChart").length) {
                var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
                new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: doughnutPieData,
                    options: doughnutPieOptions
                });
            }
        });
    </script>
</body>
</html>

<?php
	include("Foot.php");
	?>