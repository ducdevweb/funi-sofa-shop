<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Trang dành cho Shipper - Quản lý đơn hàng</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .order-card {
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .order-card:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .order-header {
            background-color: #f35525;
            color: white;
            padding: 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .order-status {
            font-weight: bold;
        }

        .progress-bar {
            background-color: #28a745;
        }

        .text-warning {
            color: #ffc107 !important;
        }

        .text-danger {
            color: #dc3545 !important;
        }

        .btn-custom {
            background-color: #f35525;
            color: white;
        }

        .btn-custom:hover {
            background-color: #e44d24;
        }

        .footer-section {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }

        .product-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
        }

        .modal-header {
            background-color: #f35525;
            color: white;
        }

        .modal-body {
            padding-top: 0;
        }

        .progress-bar {
            background-color: #28a745;
        }

        .badge {
            font-size: 0.9em;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <!-- Start Header/Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Furni<span>.</span></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Đơn hàng</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Header/Navigation -->

    <main class="container mt-5">
        <h2 class="mb-5 text-center">Danh sách đơn hàng cho Shipper</h2>

        <!-- Order List -->
        <div class="row">
            <!-- Order 1 -->
            <div class="col-md-6">
                <div class="card order-card">
                    <div class="order-header d-flex justify-content-between">
                        <h5 class="card-title">Đơn hàng #001</h5>
                        <span class="badge bg-success">Đang giao</span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <img src="https://via.placeholder.com/80" class="product-img" alt="Ghế Sofa">
                            <div class="ms-3">
                                <h6>Sản phẩm: Ghế Sofa</h6>
                                <p>Số lượng: 1</p>
                                <p>Giá: 2.500.000 VND</p>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="progress mb-3">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% - Đang giao</div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p>Tổng tiền: <strong>2.500.000 VND</strong></p>
                            <div>
                                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#orderDetail1">Xem chi tiết</button>
                                <button class="btn btn-danger">Hủy đơn</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order 2 -->
            <div class="col-md-6">
                <div class="card order-card">
                    <div class="order-header d-flex justify-content-between">
                        <h5 class="card-title">Đơn hàng #002</h5>
                        <span class="badge bg-warning">Chờ lấy hàng</span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <img src="https://via.placeholder.com/80" class="product-img" alt="Bàn Làm Việc">
                            <div class="ms-3">
                                <h6>Sản phẩm: Bàn Làm Việc</h6>
                                <p>Số lượng: 1</p>
                                <p>Giá: 1.200.000 VND</p>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="progress mb-3">
                            <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40% - Chờ lấy hàng</div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p>Tổng tiền: <strong>1.200.000 VND</strong></p>
                            <div>
                                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#orderDetail2">Xem chi tiết</button>
                                <button class="btn btn-danger">Hủy đơn</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Modal for Order 1 Details -->
    <div class="modal fade" id="orderDetail1" tabindex="-1" aria-labelledby="orderDetail1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderDetail1Label">Chi tiết đơn hàng #001</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex mb-3">
                        <img src="https://via.placeholder.com/80" class="product-img" alt="Ghế Sofa">
                        <div class="ms-3">
                            <h6>Sản phẩm: Ghế Sofa</h6>
                            <p>Số lượng: 1</p>
                            <p>Giá: 2.500.000 VND</p>
                        </div>
                    </div>
                    <p><strong>Tổng tiền:</strong> 2.500.000 VND</p>
                    <p><strong>Địa chỉ nhận hàng:</strong> 123 Đường A, Quận 1, TP.HCM</p>
                    <p><strong>Ngày mua:</strong> 20/09/2024</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Order 2 Details -->
    <div class="modal fade" id="orderDetail2" tabindex="-1" aria-labelledby="orderDetail2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderDetail2Label">Chi tiết đơn hàng #002</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex mb-3">
                        <img src="https://via.placeholder.com/80" class="product-img" alt="Bàn Làm Việc">
                        <div class="ms-3">
                            <h6>Sản phẩm: Bàn Làm Việc</h6>
                            <p>Số lượng: 1</p>
                            <p>Giá: 1.200.000 VND</p>
                        </div>
                    </div>
                    <p><strong>Tổng tiền:</strong> 1.200.000 VND</p>
                    <p><strong>Địa chỉ nhận hàng:</strong> 456 Đường B, Quận 2, TP.HCM</p>
                    <p><strong>Ngày mua:</strong> 18/09/2024</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-section text-center">
        <div class="container">
            <p>2024 © Furni. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
