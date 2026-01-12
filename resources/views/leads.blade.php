<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Selection</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <div class="home-bg">
        <div class="banner">
            <div class="banner-content">
                <h1>Find Your Perfect Car</h1>
                <p>Hatchback • Sedan • SUV</p>
            </div>
        </div>

        <div class="form-dr">
            <div class="form-wrapper" style=" font-family: Arial, sans-serif;">

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <form action="{{ route('car-form.submit') }}" method="POST" class="form-inline">
                    @csrf
                    <div class="form-field">
                        <label>Enter Name</label>
                        <input type="text" placeholder="Enter Name" name="name" value="{{ old('name') }}">
                        @error('name') <br><small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-field">
                        <label>Enter Mobile No.</label>
                        <input type="text" placeholder="Enter Mobile No." name="phone" maxlength="10" value="{{ old('phone') }}">
                        @error('phone') <br><small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-field">
                        <label>Enter Email</label>
                        <input type="email" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                        @error('email') <br><small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-field">
                        <label>Address</label>
                        <input type="text" placeholder="Enter Address" name="address" value="{{ old('address') }}">
                        @error('address') <br><small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-field full-width">Car Options...</div>

                        <div class="checkbox-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="car_options[]" id="hatchback" value="Hatchback"
                                    {{ is_array(old('car_options')) && in_array('Hatchback', old('car_options')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="hatchback">Hatchback</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="car_options[]" id="sedan" value="Sedan"
                                    {{ is_array(old('car_options')) && in_array('Sedan', old('car_options')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="sedan">Sedan</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="car_options[]" id="suv" value="SUV"
                                    {{ is_array(old('car_options')) && in_array('SUV', old('car_options')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="suv">SUV</label>
                            </div>
                        </div>

                        @error('car_options')
                        <br><small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="blue-btn">Submit</button>

                </form>

            </div>
        </div>
    </div>
</body>

</html>