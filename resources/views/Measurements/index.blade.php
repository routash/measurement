<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>Measurement List</h3>
            <a href="{{ route('measurements.create') }}" class="btn btn-success">Add</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($measurements as $measurement)
                        <tr>
                            <td>{{ $measurement->id }}</td>
                            <td>{{ $measurement->client_name }}</td>
                            <td>
                                <a href="{{ route('measurements.show', $measurement->id) }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('export.measurement', $measurement->id) }}" class="btn btn-success">
                                    Export to Excel
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


