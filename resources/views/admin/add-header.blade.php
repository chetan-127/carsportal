@include('master.header')

<div class="wrapper">
    @include('master.sidebar')

    <div class="main-panel" style="height: 100vh;">
        @include('master.navbar')

        <style>
            .mt-4, .my-4 {
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
                    <h4>Header Menu Manager</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('header.store') }}">
                        @csrf

                        <div class="row form-section">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="title"
                                        name="title"
                                        placeholder="Dashboard"
                                        required
                                    >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="label">Label</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="label"
                                        name="label"
                                        placeholder="Dashboard Menu"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="row form-section">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="url"
                                        name="url"
                                        placeholder="/dashboard"
                                        required
                                    >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Menu Type</label>
                                    <select
                                        class="form-control"
                                        id="type"
                                        name="type"
                                        required
                                        onchange="toggleMainMenu(this.value)"
                                    >
                                        <option value="">Select Type</option>
                                        <option value="menu">Main Menu</option>
                                        <option value="sub-menu">Sub Menu</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row form-section" id="mainMenuDiv" style="display:none;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="main_menu_id">Main Menu</label>
                                    <select class="form-control" id="main_menu_id"  name="main_menu_id">
                                        <option value="">Select Main Menu</option>
                                        @foreach($mainMenus as $menu)
                                            <option value="{{ $menu->id }}">
                                                {{ $menu->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row btn-container">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Save Menu
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        @include('master.scripts')
    </div>
</div>

<script>
    function toggleMainMenu(type) {
        const mainMenuDiv = document.getElementById('mainMenuDiv');
        mainMenuDiv.style.display = (type === 'sub-menu') ? 'flex' : 'none';
    }
</script>

</body>
</html>
