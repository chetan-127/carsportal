@include('master.header')

<div class="wrapper">
    @include('master.sidebar')

    <div class="main-panel" style="height: 100vh;">
        @include('master.navbar')

        <style>
            .mt-4,
            .my-4 {
                margin-top: 5.5rem !important;
            }

            .table-responsive {
                margin-top: 20px;
            }

            .add-car-btn {
                position: absolute;
                right: 15px;
            }

            img.car-thumb {
                width: 100px;
                height: 60px;
                object-fit: cover;
                border-radius: 5px;
                border: 1px solid #ddd;
            }

            .badge-price {
                background-color: #e9ecef;
                color: #28a745;
                font-weight: bold;
            }
        </style>

        <div class="content">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="card">
                <div class="card-header position-relative d-flex justify-content-between align-items-center">
                    <h4 class="m-0">Car Inventory</h4>
                    <a href="{{ route('cars.create') }}"
                        class="btn btn-success add-car-btn">
                        <i class="fa fa-plus"></i> Add New Car
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Car Name/Model</th>
                                    <th>Brand</th>
                                    <th>Year</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($cars as $key => $car)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>
                                        <img src="{{ asset($car->image) }}" class="car-thumb" alt="{{ $car->model }}">
                                    </td>

                                    <td>
                                        <strong>{{ $car->model }}</strong><br>
                                    </td>

                                    <td>{{ $car->make }}</td>

                                    <td>{{ $car->year }}</td>

                                    <td>
                                        <span class="badge badge-price">
                                            {{ number_format($car->price) }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $car->listing_type }}

                                    <td>
                                        <a href="{{ route('cars.edit', $car->id) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>

                                        <form action="{{ route('cars.destroy', $car->id) }}"
                                            method="POST"
                                            style="display:inline-block"
                                            onsubmit="return confirm('Are you sure you want to delete this car?')">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        No cars found in the inventory.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('master.scripts')
    </div>
</div>
</body>

</html>