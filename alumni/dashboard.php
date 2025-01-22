<?php
include("../config.php");
session_start();

if (!isset($_SESSION['usermail']) || empty($_SESSION['usermail']) || $_SESSION['user_type'] !== 'member') {
    header("Location: ../login.php");
    exit();
}

$usermail = $_SESSION['usermail'];

$programmeData = [];

$sql = "SELECT Programme, COUNT(*) AS count FROM member GROUP BY Programme ORDER BY Programme ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $programmeData[] = [
            'programme' => $row['Programme'],
            'count' => $row['count']
        ];
    }
} else {
    echo "No results found.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Dashboard | Alumni Association SICT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/favicon.png" type="image/x-icon">
    <?php include('includes/global_styles.php'); ?>

    <link rel="stylesheet" href="css/apexcharts.min.css">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

        <?php
        include('includes/navbar.php');
        include('includes/sidebar.php');
        ?>

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Dashboard</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="small-box text-bg-primary">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $sql = "select * from member";
                                        $result = $conn->query($sql);
                                        $count = 0;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $count = $count + 1;
                                            }
                                        }
                                        echo $count;
                                        ?>
                                    </h3>
                                    <p>Total Alumni Members</p>
                                </div>
                                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path></svg>
                                <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">More info <i class="bi bi-link-45deg"></i> </a> 
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="small-box text-bg-success">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $sql = "select * from member where Member_type = 'Associate Member'";
                                        $result = $conn->query($sql);
                                        $count = 0;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $count = $count + 1;
                                            }
                                        }
                                        echo $count;
                                        ?>
                                    </h3>
                                    <p>Total Associate Members</p>
                                </div>
                                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path clip-rule="evenodd" fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"></path><path clip-rule="evenodd" fill-rule="evenodd" d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"></path></svg>
                                <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">More info <i class="bi bi-link-45deg"></i> </a>        
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="small-box text-bg-danger">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $sql = "select * from member where Member_type = 'Member'";
                                        $result = $conn->query($sql);
                                        $count = 0;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $count = $count + 1;
                                            }
                                        }
                                        echo $count;
                                        ?>
                                    </h3>
                                    <p>Total Members</p>
                                </div>
                                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path clip-rule="evenodd" fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"></path><path clip-rule="evenodd" fill-rule="evenodd" d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"></path></svg>
                                <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">More info <i class="bi bi-link-45deg"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Comparison of Alumni Academic Programmes</h3>
                                </div>
                                <div class="card-body">
                                    <div id="programme-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>

        <?php include("includes/footer.php"); ?>

        
        <script src="js/apexcharts.min.js"></script>
        <script src="js/Sortable.min.js"></script>
        
        <script>
            const connectedSortables =
                document.querySelectorAll(".connectedSortable");
            connectedSortables.forEach((connectedSortable) => {
                let sortable = new Sortable(connectedSortable, {
                    group: "shared",
                    handle: ".card-header",
                });
            });

            const cardHeaders = document.querySelectorAll(
                ".connectedSortable .card-header",
            );
            cardHeaders.forEach((cardHeader) => {
                cardHeader.style.cursor = "move";
            });
        </script>

        <script>
            const programmeData = <?php echo json_encode($programmeData); ?>;

            const programmeNames = programmeData.map(data => data.programme);
            const counts = programmeData.map(data => data.count);

            const programmeChartOptions = {
                series: [{
                    name: "Members",
                    data: counts
                }],
                chart: {
                    height: 300,
                    type: "area",
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 800,
                        animateGradually: {
                            enabled: true,
                            delay: 150
                        },
                        dynamicAnimation: {
                            enabled: true,
                            speed: 350
                        }
                    },
                    toolbar: {
                        show: true
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                colors: ["#20c997"],
                xaxis: {
                    categories: programmeNames,
                    labels: {
                        style: {
                            colors: '#4d4d4d',
                            fontSize: '9.5px'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#4d4d4d',
                            fontSize: '12px'
                        }
                    }
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        colors: ['#ffffff']
                    },
                    background: {
                        enabled: true,
                        foreColor: '#28a745',
                        borderRadius: 4,
                        padding: 4,
                    }
                },
                tooltip: {
                    theme: 'light',
                    y: {
                        formatter: (val) => `${val} members`
                    }
                },
                markers: {
                    size: 6,
                    colors: ["#28a745"],
                    strokeColors: "#ffffff",
                    strokeWidth: 2,
                    hover: {
                        size: 8
                    }
                },
                grid: {
                    borderColor: '#e0e0e0',
                    strokeDashArray: 5,
                }
            };

            const programmeChart = new ApexCharts(document.querySelector("#programme-chart"), programmeChartOptions);
            programmeChart.render();
        </script>

</body>

</html>