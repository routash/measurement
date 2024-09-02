<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .input-th1{ width: 2rem; }
    .input-th2 { width: 7.5rem; }
    .input-th3 { width: 7.5rem; }
    .input-th4 { width: 8.5rem; }
    .input-th5 { width: 7.5rem; }
    .input-th6 { width: 7.5rem; }
    .input-th7 { width: 8.5rem; }
    .input-th8 { width: 9.5rem; }
</style>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-6 text-start">
            <h1 class="text-danger">Smart Blinds</h1>
            <p>Alexa Controlled Blinds</p>
        </div>
        <div class="col-md-6 text-end">
            <h4 class="text-primary">(425) 222 1188</h4>
            <p class="text-danger">www.smartblindshub.com</p>
        </div>
    </div>
    <div class="row mt-4 align-items-end">
        <div class="col-8">
        </div>
        <div class="col-1 text-end">Client Name</div>
        <div class="col-3">
            <input type="text" class="form-control bg-light-subtle" value="{{ $measurement->client_name }}" disabled>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="input-th1">#</th>
                        <th class="input-th2">Room/Window</th>
                        <th class="input-th3">Fabric Name</th>
                        <th class="input-th4">Cassette Type</th>
                        <th class="input-th5">Height (in.)</th>
                        <th class="input-th6">Width (in.)</th>
                        <th class="input-th7">Window Depth</th>
                        <th class="input-th8">Mount Type</th>
                        <th>Notes:</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($measurement->details as $index => $detail)
                    <tr>
                    <td>{{ $index + 1 }}</td>
                        <td>
                                <div class="form-group ">
                                    <div><input type="text" class="form-control form-control-sm small-input border bg-light-subtle" value="{{ $detail['room_name'] ?? '' }}" disabled></div>
                                </div>
                                <div class="form-group  mt-3">
                                    <label for="quantity-1" >Quantity</label>
                                    <input type="text" class="form-control form-control-sm border bg-light-subtle mt-1" value=" {{ $detail['quantity'] ?? '' }}" disabled>
                                </div>
                            </td>
                        <td>
                            <input type="text" class="form-control text-center bg-light-subtle" value="{{ $detail['fabric_name'] ?? '' }}" disabled>
                        </td>
                        <td>
                            <input type="text" class="form-control text-center bg-light-subtle" value="{{ $detail['cassette_type'] ?? '' }}" disabled>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-6 mt-1">Top: </div>
                                <div class="col-6 mt-1 text-end">
                                    <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" value="{{ $detail['top_width'] ?? '' }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mt-1">Middle: </div>
                                <div class="col-6 mt-1 text-end">
                                    <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" value="{{ $detail['middle_width'] ?? '' }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mt-1">Bottom: </div>
                                <div class="col-6 mt-1 text-end">
                                    <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" value="{{ $detail['bottom_width'] ?? '' }}" disabled>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-6 mt-1">Top: </div>
                                <div class="col-6 mt-1 text-end">
                                    <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" value="{{ $detail['left_height'] ?? '' }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mt-1">Middle: </div>
                                <div class="col-6 mt-1 text-end">
                                    <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" value="{{ $detail['middle_height'] ?? '' }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mt-1">Bottom: </div>
                                <div class="col-6 mt-1 text-end">
                                    <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" value="{{ $detail['right_height'] ?? '' }}" disabled>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="text" class="form-control text-center bg-light-subtle" value="{{ $detail['window_depth'] ?? '' }}" disabled>
                        </td>
                        <td>
                            <div>
                                <input type="radio" {{ isset($detail['mount_type']) && $detail['mount_type'] == 'inside' ? 'checked' : '' }} disabled> Inside Mount
                            </div>
                            <div>
                                <input type="radio" {{ isset($detail['mount_type']) && $detail['mount_type'] == 'outside' ? 'checked' : '' }} disabled> Outside Mount
                            </div>
                        </td>
                      <td>
                                <div class="form-group">
                                    <textarea class="form-control border bg-light-subtle  " rows="4" disabled>{{ $detail['notes'] ?? '' }}</textarea>
                                </div>
                            </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9">No details available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kt1gR7SOZ6ZYy0VNG8HtqNO5lhqI3cO3nCIXJKII3/Io+H6nblJ1C65QF6dT5Lx9" crossorigin="anonymous"></script>
