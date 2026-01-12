@include('master.header')

<div class="wrapper">
    @include('master.sidebar')

    <div class="main-panel" style="height: 100vh;">
        @include('master.navbar')

        <style>
            .mt-4, .my-4 { margin-top: 5.5rem !important; }
            .form-section {
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .form-group { width: 100%; }
            .btn-container {
                margin-top: 25px;
                text-align: center;
            }
            #mainMenuDiv.hidden {
                display: none;
            }
            #mainMenuDiv.visible {
                display: flex;
            }
        </style>

        <div class="content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit Header Menu</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('header.update', $menu->id) }}">
                        @csrf

                        <div class="row form-section">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text"
                                           class="form-control"
                                           name="title"
                                           value="{{ old('title', $menu->title) }}"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Label</label>
                                    <input type="text"
                                           class="form-control"
                                           name="label"
                                           value="{{ old('label', $menu->label) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row form-section">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text"
                                           class="form-control"
                                           name="url"
                                           value="{{ old('url', $menu->url) }}"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Menu Type</label>
                                    <select class="form-control"
                                            name="type"
                                            onchange="toggleMainMenu(this.value)"
                                            required>
                                        <option value="menu"
                                            {{ $menu->type === 'menu' ? 'selected' : '' }}>
                                            Main Menu
                                        </option>
                                        <option value="sub-menu"
                                            {{ $menu->type === 'sub-menu' ? 'selected' : '' }}>
                                            Sub Menu
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row form-section"
                             id="mainMenuDiv"
                             class="{{ $menu->type === 'sub-menu' ? 'visible' : 'hidden' }}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Main Menu</label>
                                    <select class="form-control" name="main_menu_id">
                                        <option value="">Select Main Menu</option>
                                        @foreach($mainMenus as $parent)
                                            <option value="{{ $parent->id }}"
                                                {{ $menu->main_menu_id == $parent->id ? 'selected' : '' }}>
                                                {{ $parent->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row btn-container">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Update Menu
                                </button>
                                <a href="{{ route('header.index') }}"
                                   class="btn btn-secondary ml-2">
                                    Cancel
                                </a>
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
        mainMenuDiv.style.display = (type === 'submenu') ? 'flex' : 'none';
    }
</script>

</body>
</html>
