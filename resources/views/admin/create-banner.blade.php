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
                max-width: 100%;
            }

            .form-control {
                width: 100%;
                padding: 10px;
            }

            .btn-container {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .icon-text {
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .icon-text i {
                font-size: 16px;
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
                    <h4>Add Banner</h4>
                </div>
                <div class="card-body">
                    <form class="excel" method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row form-section">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="url" class="form-control" id="link" name="link">
                                </div>
                            </div>
                        </div>

                        <div class="row form-section">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image</label>

                                    <div style="border:1px dashed #ccc; padding:10px; text-align:center;">
                                        <img
                                            id="imagePreview"
                                            src="{{ asset('images/uploader.jfif') }}"
                                            alt="Image Preview"
                                            style="width:100%; max-height:150px; object-fit:contain; margin-bottom:10px;">

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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alt_text">Alt Text</label>
                                    <input type="text" class="form-control" id="alt_text" name="alt_text">
                                </div>
                            </div>
                        </div>

                        <div class="row form-section">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <input type="text" class="form-control" id="position" name="position">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="display_order">Display Order</label>
                                    <input type="number" class="form-control" id="display_order" name="display_order" min="0">
                                </div>
                            </div>
                        </div>

                        <div class="row form-section">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_active">Status</label>
                                    <select class="form-control" id="is_active" name="is_active">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row btn-container">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Save</button>
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
                    const output = document.getElementById('imagePreview');
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
    </div>
</div>

</body>

</html>