@include('master.header')

<div class="wrapper">
    @include('master.sidebar')

    <div class="main-panel">
        @include('master.navbar')

        <style>
            .mt-4 {
                margin-top: 5.5rem;
            }

            .table-responsive {
                margin-top: 20px;
            }

            .nowrap {
                white-space: nowrap;
            }
        </style>

        <div class="content mt-4">
            <div class="card">
                <div class="card-header">
                    <h4>Car Leads</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Car Options</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($leads as $key => $lead)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $lead->name }}</td>
                                    <td class="nowrap">{{ $lead->phone }}</td>
                                    <td>{{ $lead->email ?? '-' }}</td>
                                    <td>{{ $lead->address ?? '-' }}</td>
                                    <td>
                                        @php $options = json_decode($lead->car_options, true); @endphp
                                        @php $options = json_decode($options, true); @endphp
                                        @if(is_array($options))
                                        @foreach($options as $opt)
                                        <span class="badge badge-info mr-1">{{ $opt }}</span>
                                        @endforeach
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td class="nowrap">
                                        {{ \Carbon\Carbon::parse($lead->created_at)->format('d M Y, h:i A') }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        No leads found
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