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

            .form-section {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .form-group {
                width: 100%;
            }

            .btn-container {
                margin-top: 20px;
                text-align: center;
            }
        </style>

        <div class="content">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Car Manager</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('car.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row form-section">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="make">Make</label>
                                    <input type="text" class="form-control" id="make" name="make" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="model">Model</label>
                                    <input type="text" class="form-control" id="model" name="model" required>
                                </div>
                            </div>
                        </div>

                        <div class="row form-section">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="number" class="form-control" id="year" name="year" min="1900" max="{{ date('Y') + 1 }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="text" class="form-control" id="color" name="color">
                                </div>
                            </div>
                        </div>

                        <div class="row form-section">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mileage">Mileage</label>
                                    <input type="number" class="form-control" id="mileage" name="mileage">
                                </div>
                            </div>
                        </div>

                        <div class="row form-section">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fuel_type">Fuel Type</label>
                                    <select class="form-control" id="fuel_type" name="fuel_type">
                                        <option value="">Select Fuel Type</option>
                                        <option value="petrol">Petrol</option>
                                        <option value="diesel">Diesel</option>
                                        <option value="electric">Electric</option>
                                        <option value="hybrid">Hybrid</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="car_type">Car Type</label>
                                    <select class="form-control" id="car_type" name="car_type">
                                        <option value="">Select Type</option>
                                        <option value="sedan">Sedan</option>
                                        <option value="suv">SUV</option>
                                        <option value="hatchback">Hatchback</option>
                                        <option value="truck">Truck</option>
                                        <option value="coupe">Coupe</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row form-section">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Car Image</label>

                                    <div style="border:1px dashed #ccc; padding:10px; text-align:center;">
                                        <img
                                            id="imagePreview"
                                            src="{{ asset('images/uploader.jfif') }}"
                                            alt="Car Image Preview"
                                            style="width:100%; max-height:180px; object-fit:contain; margin-bottom:10px;">

                                        <input
                                            type="file"
                                            class="form-control"
                                            id="image"
                                            name="image"
                                            accept="image/*"
                                            onchange="previewImage(event)">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row btn-container">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Save Car
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        @include('master.scripts')

        <script>
            function previewImage(event) {
                const reader = new FileReader();
                reader.onload = function() {
                    document.getElementById('imagePreview').src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>

    </div>
</div>
</body>

</html>