<?php require_once __DIR__ . '/../header.php'; ?>

    <!-- Main Content Wrapper -->
    <div id="main-content">
        <!-- Top Navbar -->
        <nav class="top-navbar d-flex align-items-center justify-content-between sticky-top">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light d-lg-none border" id="sidebarToggle">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <h5 class="fw-bold m-0 text-dark">Báo Cáo & Thống Kê Dữ Liệu</h5>
            </div>

            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-2 rounded-pill">
                    <i class="fa-solid fa-database me-1"></i> MySQL Connected
                </span>
                <div class="vr h-100 my-auto"></div>
                <div class="d-flex align-items-center gap-2">
                    <img src="https://placehold.co/36x36/4f46e5/ffffff?text=AD" class="rounded-circle" alt="Admin">
                    <span class="fw-medium small d-none d-sm-inline">Admin User</span>
                </div>
            </div>
        </nav>

        <!-- Main Body Content -->
        <div class="p-4">

            <!-- 4 Key Stat Cards -->
            <div class="row g-3 mb-4">
                <!-- Stat 1: tblproduct -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card stat-card shadow-sm h-100 p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted small fw-medium">Tổng Sản Phẩm (`tblproduct`)</span>
                                <h3 class="fw-bold text-dark my-1"><?= $tongSP ?></h3>
                                <small class="text-success fw-semibold"><i class="fa-solid fa-circle-check me-1"></i>7 biến thể sẵn có</small>
                            </div>
                            <div class="icon-shape bg-primary bg-opacity-10 text-primary">
                                <i class="fa-solid fa-box"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stat 2: tblcategory -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card stat-card shadow-sm h-100 p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted small fw-medium">Danh Mục (`tblcategory`)</span>
                                <h3 class="fw-bold text-dark my-1"><?= $tongDanhMuc ?></h3>
                                <small class="text-info fw-semibold"><i class="fa-solid fa-layer-group me-1"></i>7/8 danh mục hoạt động</small>
                            </div>
                            <div class="icon-shape bg-info bg-opacity-10 text-info">
                                <i class="fa-solid fa-list"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stat 3: tblcart -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card stat-card shadow-sm h-100 p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted small fw-medium">Đơn Hàng / Giỏ (`tblcart`)</span>
                                <h3 class="fw-bold text-dark my-1"><?= $tongDonHang ?></h3>
                                <small class="text-warning fw-semibold"><i class="fa-solid fa-clock me-1"></i>1 đơn chờ xác nhận</small>
                            </div>
                            <div class="icon-shape bg-warning bg-opacity-10 text-warning">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stat 4: tbluser -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card stat-card shadow-sm h-100 p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted small fw-medium">Người Dùng (`tbluser`)</span>
                                <h3 class="fw-bold text-dark my-1"><?= $tongNguoiDung ?></h3>
                                <small class="text-success fw-semibold"><i class="fa-solid fa-user-check me-1"></i>3 Khách hàng • 1 Admin</small>
                            </div>
                            <div class="icon-shape bg-success bg-opacity-10 text-success">
                                <i class="fa-solid fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

        </div>
    </div>

 
<?php require_once __DIR__ . '/../footer.php'; ?>