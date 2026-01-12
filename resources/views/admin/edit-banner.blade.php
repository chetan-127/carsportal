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
                    <h4>Banner Manager</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('banners.update', $banner->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text"
                                name="title"
                                class="form-control"
                                value="{{ old('title', $banner->title) }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input type="url"
                                name="link"
                                class="form-control"
                                value="{{ old('link', $banner->link) }}">
                        </div>

                        <div class="form-group">
                            <label>Image</label>

                            <div style="border:1px dashed #ccc; padding:10px; text-align:center;">
                                <img id="imagePreview"
                                    src="{{ asset($banner->image) }}"
                                    style="width:100%; max-height:150px; object-fit:contain; margin-bottom:10px;">

                                <input type="file"
                                    name="image"
                                    class="form-control"
                                    accept="image/*"
                                    onchange="previewImage(event)">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Alt Text</label>
                            <input type="text"
                                name="alt_text"
                                class="form-control"
                                value="{{ old('alt_text', $banner->alt_text) }}">
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <input type="text"
                                name="position"
                                class="form-control"
                                value="{{ old('position', $banner->position) }}">
                        </div>

                        <div class="form-group">
                            <label>Display Order</label>
                            <input type="number"
                                name="display_order"
                                class="form-control"
                                value="{{ old('display_order', $banner->display_order) }}">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="is_active" class="form-control">
                                <option value="1" {{ $banner->is_active ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$banner->is_active ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Update Banner
                        </button>
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