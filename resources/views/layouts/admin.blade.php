<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
    <meta name="author" content="MateStore">
    <meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, aDesign template">

    <link rel="shortcut icon" href="{{ asset('aDesign/img/icons/icon-48x48.png') }}" />

    <title>MateStore Demo - Web UI Kit &amp; Dashboard Template</title>

    <link href="{{ asset('aDesign/css/app.css') }}" rel="stylesheet">

</head>

<body>
<div class="wrapper">
    <nav id="sidebar" class="sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="{{ route('home') }}">
                <span class="align-middle">MateStore</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Pages
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.user.index') }}">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Users</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#products" data-toggle="collapse" class="sidebar-link collapsed">
                        <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Products</span>
                    </a>
                    <ul id="products" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.product.index') }}">All products</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.product.trashed') }}">Trashed</a></li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="#orders" data-toggle="collapse" class="sidebar-link collapsed">
                        <i class="align-middle" data-feather="list"></i> <span class="align-middle">Orders</span>
                    </a>
                    <ul id="orders" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.order.index') }}">Orders list</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.order.accepted') }}">Accepted</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.order.declined') }}">Declined</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>

    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle d-flex">
                <i class="hamburger align-self-center"></i>
            </a>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
{{--                    @if(auth()->user()->role_id === 2)--}}
                        <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
                            <div class="position-relative">
                                <i class="align-middle" data-feather="message-square"></i>
                                @if($ordersCount > 0)
                                    <span class="indicator">{{ $ordersCount }}</span>
                                @endif
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
                            <div class="dropdown-menu-header">
                                <div class="position-relative">
                                    @if($ordersCount > 0)
                                        {{ $ordersCount }} New Messages. Check it <a href="{{ route('admin.order.index') }}">here</a>
                                    @else
                                        There are no new messages
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
{{--                    @endif--}}
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                            <i class="align-middle" data-feather="settings"></i>
                        </a>

                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                           <span class="text-dark">{{ auth()->user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf

                                <button type="submit" class="text-sm text-gray-700 underline" style="background: none; border: none; cursor: pointer;">Logout</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="content">
            @yield('content')
        </main>
    </div>
</div>

<script src="{{ asset('aDesign/js/vendor.js') }}"></script>
<script src="{{ asset('aDesign/js/app.js') }}"></script>

<script>
    $(function() {
        var ctx = document.getElementById('chartjs-dashboard-line').getContext("2d");
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, 'rgba(215, 227, 244, 1)');
        gradient.addColorStop(1, 'rgba(215, 227, 244, 0)');
        // Line chart
        new Chart(document.getElementById("chartjs-dashboard-line"), {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales ($)",
                    fill: true,
                    backgroundColor: gradient,
                    borderColor: window.theme.primary,
                    data: [
                        2115,
                        1562,
                        1584,
                        1892,
                        1587,
                        1923,
                        2566,
                        2448,
                        2805,
                        3438,
                        2917,
                        3327
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    intersect: false
                },
                hover: {
                    intersect: true
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        reverse: true,
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 1000
                        },
                        display: true,
                        borderDash: [3, 3],
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }]
                }
            }
        });
    });
</script>
<script>
    $(function() {
        // Pie chart
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: 'pie',
            data: {
                labels: ["Chrome", "Firefox", "IE"],
                datasets: [{
                    data: [4306, 3801, 1689],
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger
                    ],
                    borderWidth: 5
                }]
            },
            options: {
                responsive: !window.MSInputMethodContext,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                cutoutPercentage: 75
            }
        });
    });
</script>
<script>
    $(function() {
        // Bar chart
        new Chart(document.getElementById("chartjs-dashboard-bar"), {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "This year",
                    backgroundColor: window.theme.primary,
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                    barPercentage: .75,
                    categoryPercentage: .5
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 20
                        }
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        }
                    }]
                }
            }
        });
    });
</script>
<script>
    $(function() {
        $("#world_map").vectorMap({
            map: "world_mill",
            normalizeFunction: "polynomial",
            hoverOpacity: .7,
            hoverColor: false,
            regionStyle: {
                initial: {
                    fill: "#e3eaef"
                }
            },
            markerStyle: {
                initial: {
                    "r": 9,
                    "fill": window.theme.primary,
                    "fill-opacity": .95,
                    "stroke": "#fff",
                    "stroke-width": 7,
                    "stroke-opacity": .4
                },
                hover: {
                    "stroke": "#fff",
                    "fill-opacity": 1,
                    "stroke-width": 1.5
                }
            },
            backgroundColor: "transparent",
            zoomOnScroll: false,
            markers: [{
                latLng: [31.230391, 121.473701],
                name: "Shanghai"
            },
                {
                    latLng: [28.704060, 77.102493],
                    name: "Delhi"
                },
                {
                    latLng: [6.524379, 3.379206],
                    name: "Lagos"
                },
                {
                    latLng: [35.689487, 139.691711],
                    name: "Tokyo"
                },
                {
                    latLng: [23.129110, 113.264381],
                    name: "Guangzhou"
                },
                {
                    latLng: [40.7127837, -74.0059413],
                    name: "New York"
                },
                {
                    latLng: [34.052235, -118.243683],
                    name: "Los Angeles"
                },
                {
                    latLng: [41.878113, -87.629799],
                    name: "Chicago"
                },
                {
                    latLng: [51.507351, -0.127758],
                    name: "London"
                },
                {
                    latLng: [40.416775, -3.703790],
                    name: "Madrid"
                }
            ]
        });
        setTimeout(function() {
            $(window).trigger('resize');
        }, 250)
    });
</script>
<script>
    $(function() {
        $('#datetimepicker-dashboard').datetimepicker({
            inline: true,
            sideBySide: false,
            format: 'L'
        });
    });
</script>

<script>
    @yield('script')
</script>

<!--SweetAlert-->
@include('sweetalert::alert')
</body>

</html>
