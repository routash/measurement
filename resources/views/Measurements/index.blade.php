<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Measurements List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
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
                                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#measurementModal" data-id="{{ $measurement->id }}">Show</a>
                                    <a href="{{ route('export.measurement', $measurement->id) }}" class="btn btn-success">Export to Excel</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="measurementModal" tabindex="-1" aria-labelledby="measurementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="measurementModalLabel">Measurement Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Content will be loaded via AJAX -->
            </div>
            <div class="modal-footer">
               
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var measurementModal = document.getElementById('measurementModal');

        measurementModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var measurementId = button.getAttribute('data-id');
            var modalBody = measurementModal.querySelector('.modal-body');

            fetch(`/measurements/${measurementId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Network response was not ok. Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Data fetched:', data); 
                    if (data.error) {
                        modalBody.innerHTML = `<p class="text-danger">${data.error}</p>`;
                    } else {
                        let detailsHtml = '';
                        let displayHeader = true; 

                        if (Array.isArray(data.details)) {
                            data.details.forEach((detail, index) => {
                                if (displayHeader) {
                                    detailsHtml += `
                                        <style>
                                            .input-th1 { width: 2rem; }
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
                                                <div class="col-9"></div>
                                                <div class="col-1 text-end">Client Name</div>
                                                <div class="col-2">
                                                    <input type="text" class="form-control bg-light-subtle" value="${data.client_name || ''}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                    displayHeader = false; 
                                }

                                detailsHtml += `
                                    <div class="container-fluid">
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
                                                            <th class="input-th7">Blind Type</th>
                                                            <th class="input-th8">Mount Type</th>
                                                            <th>Notes:</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>${index + 1}</td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <div>
                                                                        <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" value="${detail.room_name || ''}" disabled>
                                                                    </div>
                                                                    <div class="form-group mt-3">
                                                                        <label for="quantity-${index}">Quantity</label>
                                                                        <input type="text" class="form-control form-control-sm border bg-light-subtle mt-1" value="${detail.quantity || ''}" disabled>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                             <div>
                                                                <input type="text" class="form-control form-control-sm small-input border bg-light-subtle"  value="${detail.fabric_name || ''}" disabled>
                                                             </div>
                                                                </td>
                                                            <td>
                                                             <div>
                                                                <input type="text" class="form-control form-control-sm small-input border bg-light-subtle"  value="${detail.cassette_type || ''}" disabled>
                                                            </div>
                                                                </td>
                                                            <td>
                                                                    <div>
                                                                        <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" value="${detail.top_width || ''}" disabled>
                                                                    </div>
                                                            </td>
                                                            <td>
                                                                    <div>
                                                                        <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" value="${detail.left_height || ''}" disabled>
                                                                    </div>
                                                            </td>
                                                        <td>
                                                            <select class="form-control form-control-sm border bg-light-subtle" name="details[${index}][blind_type]" disabled>
                                                                <option value="wand" ${detail.blind_type === 'wand' ? 'selected' : ''}>Wand</option>
                                                                <option value="string" ${detail.blind_type === 'string' ? 'selected' : ''}>String</option>
                                                                <option value="motorized" ${detail.blind_type === 'motorized' ? 'selected' : ''}>Motorized</option>
                                                                <option value="touchless" ${detail.blind_type === 'touchless' ? 'selected' : ''}>Touchless</option>
                                                            </select>
                                                        </td>
                                                              <td>
                                                                   <div>
                                                                       <input type="radio" name="mount_type_${index}" value="inside" ${detail.mount_type === 'inside' ? 'checked' : ''} disabled> Inside Mount
                                                                   </div>
                                                                   <div>
                                                                       <input type="radio" name="mount_type_${index}" value="outside" ${detail.mount_type === 'outside' ? 'checked' : ''} disabled> Outside Mount
                                                                   </div>
                                                               </td>

                                                            <td>
                                                                <textarea class="form-control border bg-light-subtle" rows="4" disabled>${detail.notes || ''}</textarea>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });
                        }

                        modalBody.innerHTML = `${detailsHtml}`;
                    }
                })
                .catch(error => {
                    console.error('Error fetching measurement details:', error);
                    modalBody.innerHTML = '<p class="text-danger">Failed to load data.</p>';
                });
        });
    });
</script>

</body>
</html>
