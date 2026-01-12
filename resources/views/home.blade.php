<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP Assignment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
        }

        .banner-img {
            height: 420px;
            object-fit: cover;
        }

        .car-card {
            transition: transform .2s ease;
        }

        .car-card:hover {
            transform: translateY(-5px);
        }

        .car-card img {
            height: 170px;
            object-fit: cover;
        }

        .car-img-wrap {
            position: relative;
        }

        .fuel-badge {
            position: absolute;
            top: 8px;
            left: 8px;
            background: rgba(0, 0, 0, 0.75);
            color: #fff;
            font-size: 11px;
            padding: 4px 8px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 4px;
            text-transform: uppercase;
        }

        .car-specs {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: #6c757d;
            border-top: 1px solid #eee;
            padding-top: 6px;
            margin-top: 6px;
            flex-wrap: wrap;
        }

        .car-specs span {
            display: flex;
            align-items: center;
            gap: 4px;
            white-space: nowrap;
        }

        .section-title {
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .banner-img {
                height: 240px;
            }

            .car-card img {
                height: 140px;
            }

            .car-type {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-danger" href="/">Assignment</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto">

                    @foreach($headers as $item)

                    @if($item->children->count())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                            href="#"
                            id="menu{{ $item->id }}"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ $item->title }}
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="menu{{ $item->id }}">
                            @foreach($item->children as $child)
                            <li>
                                <a class="dropdown-item" href="{{ $child->url }}">
                                    {{ $child->title }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>

                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $item->url }}">
                            {{ $item->title }}
                        </a>
                    </li>
                    @endif

                    @endforeach

                </ul>
            </div>

        </div>
    </nav>

    <div id="homeBanner" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($banners as $key => $banner)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img src="{{ asset('/'.$banner->image) }}" class="d-block w-100 banner-img" alt="">
            </div>
            @endforeach
        </div>
    </div>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="section-title">Most Searched Cars</h4>
            <a href="#" class="text-danger text-decoration-none">View All</a>
        </div>

        <div class="row g-4">
            @foreach($mostSearchedCars as $car)
            <div class="col-6 col-sm-4 col-md-3">
                <div class="card car-card shadow-sm h-100">

                    <div class="car-img-wrap">
                        <img src="{{ asset($car->image) }}" class="card-img-top" alt="">
                        <span class="fuel-badge">
                            <i class="bi bi-fuel-pump"></i>
                            {{ ucfirst($car->fuel) }}
                        </span>
                    </div>

                    <div class="card-body">
                        <h6 class="mb-1">{{ $car->make }} {{ $car->model }}</h6>

                        <div class="car-specs">
                            <span>
                                <i class="bi bi-calendar3"></i>
                                {{ $car->year }}
                            </span>

                            <span>
                                <i class="bi bi-speedometer2"></i>
                                {{ number_format($car->mileage) }} km
                            </span>

                            <span>
                                <i class="bi bi-car-front"></i>
                                {{ ucfirst($car->car_type) }}
                            </span>
                        </div>

                        <strong class="text-danger mt-2 d-block">
                            {{ $car->price }}
                        </strong>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="section-title">Latest Cars</h4>
            <a href="#" class="text-danger text-decoration-none">View All</a>
        </div>

        <div class="row g-4">
            @foreach($latestCars as $car)
            <div class="col-6 col-sm-4 col-md-3">
                <div class="card car-card shadow-sm h-100">

                    <div class="car-img-wrap">
                        <img src="{{ asset($car->image) }}" class="card-img-top" alt="">
                        <span class="fuel-badge">
                            <i class="bi bi-fuel-pump"></i>
                            {{ ucfirst($car->fuel) }}
                        </span>
                    </div>

                    <div class="card-body">
                        <h6 class="mb-1">{{ $car->make }} {{ $car->model }}</h6>

                        <div class="car-specs">
                            <span>
                                <i class="bi bi-calendar3"></i>
                                {{ $car->year }}
                            </span>

                            <span>
                                <i class="bi bi-speedometer2"></i>
                                {{ number_format($car->mileage) }} km
                            </span>

                            <span>
                                <i class="bi bi-car-front"></i>
                                {{ ucfirst($car->car_type) }}
                            </span>
                        </div>

                        <strong class="text-danger mt-2 d-block">
                            ₹{{ $car->price }}
                        </strong>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-1">© {{ date('Y') }} PHP Assignment</p>
            <small class="text-secondary">All rights reserved</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>