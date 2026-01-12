@include('master.header')

<div class="wrapper">
    @include('master.sidebar')

    <div class="main-panel" style="height: 100vh;">
        @include('master.navbar')

        <style>
            .mt-4, .my-4 { margin-top: 5.5rem !important; }
            .table-responsive { margin-top: 20px; }
            .add-account-btn {
                position: absolute;
                right: 15px;
            }
            img.banner-thumb {
                width: 120px;
                height: 60px;
                object-fit: cover;
                border-radius: 5px;
            }
        </style>

        <div class="content">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header position-relative">
                    <h4>Banner Listing</h4>
                    <a href="{{ route('banner.create') }}"
                       class="btn btn-success add-account-btn">
                        Add Banner
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($banners as $key => $banner)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td>
                                            <img src="{{ asset($banner->image) }}"
                                                 class="banner-thumb">
                                        </td>

                                        <td>{{ $banner->title }}</td>
                                        <td>{{ $banner->position ?? '-' }}</td>

                                        <td>
                                            @if($banner->is_active)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>

                                        <td>{{ $banner->display_order }}</td>

                                        <td>
                                            <a href="{{ route('banners.edit', $banner->id) }}"
                                               class="btn btn-sm btn-primary">
                                                Edit
                                            </a>

                                            <form action="{{ route('banners.delete', $banner->id) }}"
                                                  method="POST"
                                                  style="display:inline-block"
                                                  onsubmit="return confirm('Delete this banner?')">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No banners found
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