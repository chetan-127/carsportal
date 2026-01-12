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

            .add-btn {
                position: absolute;
                right: 15px;
                top: 10px;
            }
        </style>

        <div class="content">

            {{-- Success Message --}}
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="card">
                <div class="card-header position-relative">
                    <h4>Header Menu Manager</h4>

                    <a href="{{ route('header.create') }}" class="btn btn-success add-btn">
                        + Add Menu
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Label</th>
                                    <th>URL</th>
                                    <th>Type</th>
                                    <th>Main Menu</th>
                                    <th width="150">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($menus as $key => $menu)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $menu->title }}</td>

                                    <td>{{ $menu->label ?? '-' }}</td>

                                    <td>{{ $menu->url }}</td>

                                    <td>
                                        @if($menu->type === 'menu')
                                        <span class="badge badge-primary">Main Menu</span>
                                        @else
                                        <span class="badge badge-info">Sub Menu</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $menu->parent?->title ?? '-' }}
                                    </td>


                                    <td class="text-center">
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                            <a href="{{ route('header.edit', $menu->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit
                                            </a>

                                            <form action="{{ route('header.delete', $menu->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Delete this menu?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        No header menus found
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