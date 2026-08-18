    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <style>
            body {
                background-color: #f5f6f8;
                font-family: Arial, Helvetica, sans-serif;
            }

            .product-card {
                border: none;
                border-radius: 15px;
                transition: 0.2s;
                overflow: hidden;

            }

            .product-card:hover {
                transform: translateY(-4);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.10);
            }

            .product-image {
                height: 130px;
                display: flex;
                /* align-items: center; */
                justify-content: center;
            }

            .product-image img {
                object-fit: cover;
                width: 100%;
            }

            .price {
                color: #6f4e37;
                font-weight: bold;
            }

            .cart-box {
                position: sticky;
                top: 20px;
            }

            .cart-item {
                border-bottom: 1px solid #eee;
                padding: 12px 0;
            }

            .cart-item:last-child {
                border-bottom: none;
            }

            .quantity-btn {
                width: 30px;
                height: 30px;
                padding: 0;
                border-radius: 50%;
            }

            .total-price {
                font-size: 25px;
                font-weight: bold;
                color: #6f4e37;
            }

            .payment-btn {
                border-radius: 10px;
            }
        </style>
        <title>Kopi PPKD Jakarta Pusat</title>
    </head>

    <body>
        <div class="container-fluid">
            <main class="col-lg-12 p-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h3 class="fw-bold mb-1">Point Of Sales</h3>
                        <p class="text-muted">POS - Toko Kopi PPKD Jakarta Pusat</p>

                    </div>
                    <button class="btn btn-dark">Empty Cart</button>
                </div>
                <div class="row g-5 mb-5">
                    <div class="col-md-4">
                        <div class="card shadow p-3">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    <i class="bi bi-cart" style="font-size: 2rem"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Today's Transaction</small>
                                    <h4 class="mb-0 fw-bold">10</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow p-3">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    <i class="bi bi-cart" style="font-size: 2rem"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Today's Sales</small>
                                    <h4 class="mb-0 fw-bold">Rp. 10.000.000,-</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow p-3">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    <i class="bi bi-cart" style="font-size: 2rem"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Product Sold</small>
                                    <h4 class="mb-0 fw-bold">100</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-7">
                                        <h5 class="fw-bold">Select Product</h5>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" name="" id="searchProduct" class="form-control"
                                            placeholder="Search Product...">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <button class="btn btn-dark btn-sm me-1 category-btn">Semua</button>
                                    @foreach ($categories as $category)
                                        <button
                                            class="btn btn-dark btn-sm me-1 category-btn">{{ $category->name ?? '' }}</button>
                                    @endforeach
                                </div>
                                <div class="row g-3" id="productList">
                                    @foreach ($products as $product)
                                        <div class="col-md-4 col-sm-6">
                                            <div class="card product-card shadow h-100">
                                                <div class="product-image"><img
                                                        src="{{ asset('storage/' . $product->photo) }}" alt="">
                                                </div>
                                                <div class="card-body">
                                                    <span class="badge bgt-light text-dark mb-2">
                                                        {{ $product->description ?? '' }}
                                                    </span>
                                                    <h6 class="fw-bold">{{ $product->name ?? '' }}</h6>
                                                    <span
                                                        class="price">{{ number_format($product->price, 0, ',', '.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border-0 shadow cart-box p-3">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="fw-bold mb-0">
                                    <i class="bi bi-cart"></i> Cart
                                </h5>
                                <span class="badge bg-dark" id="cartCount">
                                    0
                                </span>
                            </div>
                            <div class="mb-3" id="cartItems">
                                <div class="text-center text-muted py-5">
                                    <i class="bi bi-cart4"></i>
                                    <p>Cart Still Empty</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Sub Total</span>
                                <strong id="subtotal">Rp. 0</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Pajak (11%)</span>
                                <strong id="tax">Rp. 0</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-bold">Total</span>
                                <span class="total-price" id="total">Rp. 0</span>
                            </div>
                            <button class="btn btn-success w-100 py-3">Payment</button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
    </body>

    </html>
