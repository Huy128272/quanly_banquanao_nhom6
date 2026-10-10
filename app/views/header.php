<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê Quản Trị - Admin Analytics Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6 Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --sidebar-width: 250px;
            --primary-color: #4f46e5;
            --primary-light: #e0e7ff;
            --bg-body: #f8fafc;
            --sidebar-bg: #0f172a;
            --card-border: #f1f5f9;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: #334155;
            overflow-x: hidden;
        }

        /* Sidebar Design */
        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: var(--sidebar-bg);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        #sidebar .nav-link {
            color: #94a3b8;
            padding: 12px 18px;
            font-weight: 500;
            border-radius: 8px;
            margin: 4px 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s ease;
        }

        #sidebar .nav-link:hover,
        #sidebar .nav-link.active {
            color: #ffffff;
            background-color: var(--primary-color);
        }

        /* Main Content Container */
        #main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* Top Navbar */
        .top-navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 14px 28px;
        }

        /* Stat Cards */
        .stat-card {
            border: 1px solid var(--card-border);
            border-radius: 12px;
            background: #ffffff;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.05);
        }

        .icon-shape {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        /* Chart Containers */
        .chart-card {
            border: 1px solid var(--card-border);
            border-radius: 12px;
            background: #ffffff;
        }

        /* Clean Table */
        .table-clean th {
            background-color: #f8fafc;
            color: #64748b;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 12px 16px;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-clean td {
            padding: 14px 16px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        /* Responsive Breakpoints */
        @media (max-width: 991.98px) {
            #sidebar {
                margin-left: calc(-1 * var(--sidebar-width));
            }
            #sidebar.active {
                margin-left: 0;
            }
            #main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <div id="sidebar" class="d-flex flex-column justify-content-between py-3">
        <div>
            <!-- Sidebar Header -->
            <div class="px-4 mb-4 d-flex align-items-center gap-3">
                <div class="bg-primary text-white rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                    <i class="fa-solid fa-chart-line fs-5"></i>
                </div>
                <div>
                    <h6 class="text-white fw-bold m-0">ADMIN STATS</h6>
                    <small class="text-muted" style="font-size: 0.75rem;">Báo cáo thống kê</small>
                </div>
            </div>

            <!-- Sidebar Links -->
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="index.php" class="nav-link active">
                        <i class="fa-solid fa-chart-pie"></i>
                        <span>Tổng Quan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?modun=Sanpham" class="nav-link">
                        <i class="fa-solid fa-box-archive"></i>
                        <span>Quản lý Sản Phẩm</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?modun=Danhmuc" class="nav-link">
                        <i class="fa-solid fa-list"></i>
                        <span>Quản lý Danh Mục</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?modun=Chitiet" class="nav-link">
                        <i class="fa-solid fa-ruler-combined"></i>
                        <span>Chi Tiết Sản Phẩm</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?modun=Giohang" class="nav-link">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Quản lý Giỏ Hàng</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?modun=Nguoidung" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <span>Quản lý Người Dùng</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#orders-report" class="nav-link">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Báo Cáo Đơn Hàng</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#users-report" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <span>Thống Kê Người Dùng</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Sidebar Footer / Admin info -->
        <div class="px-3">
            <div class="p-2 rounded-3 bg-dark bg-opacity-50 text-white d-flex align-items-center gap-2">
                <img src="https://placehold.co/36x36/4f46e5/ffffff?text=AD" class="rounded-circle" alt="Admin Avatar">
                <div>
                    <div class="fw-semibold small">Quản Trị Viên</div>
                    <div class="text-muted" style="font-size: 0.7rem;">Hệ thống thống kê</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Wrapper -->
    <div id="main-content">