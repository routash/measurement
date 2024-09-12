<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .cut-button {
        float: right;
        position: absolute;
        bottom: -8px;
        right: -8px;
        z-index: 999;
    }
    .cut-button  button{
        height: 16px;
        width: 16px;
        padding: 0px;
        margin: 0px;
    }
    
    .input-th1 {
        width: 2rem;
    }
    .input-th2 {
        width: 7.5rem;
    }
    .input-th3 {
        width: 8.5rem;
    }
    .input-th4 {
        width: 7.5rem;
    }
    .input-th5 {
        width: 8.5rem;
    }
    .input-th6 {
        width: 8.5rem;
    }
    .input-th7 {
        width: 8.5rem;
    }
    .input-th8 {
        width: 9.5rem;
    }
    .detail-outer{
        position: relative;
    }
</style>
<title>Create Measurements</title>
</head>

<body>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-6 text-start ">
            <h1 class="text-danger">Smart Blinds</h1>
            <p>Alexa Controlled Blinds</p>
        </div>
        <div class="col-md-6 text-end">
            <h4 class="text-primary">(425) 222 1188</h4>
            <p class="text-danger">www.smartblindshub.com</p>
        </div>
    </div>
    <form action="{{ route('measurements.store') }}" method="POST">
        @csrf
        <div class="row mt-4 align-items-end">
            <div class="col-md-8"></div>
            <div class="col-md-4 d-flex">
                <label for="client-name" class="text-danger text-nowrap">Client Name</label>
                <input type="text" class="mx-2 form-control form-control-sm border bg-light-subtle" id="client-name" name="client_name">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="input-th1">#</th>
                            <th class="input-th2">Room/Window</th>
                            <th class="input-th3">Cassette Type</th>
                            <th class="input-th4">Fabric Name</th>
                            <th class="input-th5">Width (in.)</th>
                            <th class="input-th6">Height (in.)</th>
                            <th class="input-th7">Blind Type</th>
                            <th class="input-th8">Mount Type</th>
                            <th>Notes:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="detail-outer">
                            <td>1</td>
                            <td>
                                <div class="form-group ">
                                    <div><input type="text" class="form-control form-control-sm small-input border bg-light-subtle" id="room-name-1" name="details[0][room_name]"></div>
                                </div>
                                <div class="form-group  mt-3">
                                    <label for="quantity-1" >Quantity</label>
                                    <input type="text" class="form-control form-control-sm border bg-light-subtle mt-1" id="quantity-1" name="details[0][quantity]">
                                </div>
                            </td>
                            <td class="input-td-cassette">
                                <div class="form-group ">
                                    <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" id="fabric-name-1" name="details[0][fabric_name]">
                                </div>
                            </td>
                            <td class="input-td1">
                                <div class="form-group  ">
                                    <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" id="cassette-type-1" name="details[0][cassette_type]">
                                </div>
                            </td>
                            <td class="input-td1">
                                
                                    <div class="form-group  ">
                                        <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" id="top-width-1" name="details[0][top_width]">
                                    </div>                            
                            </td>
                            <td class="input-td1">
                              
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" id="left-height-1" name="details[0][left_height]">
                                    </div>
                            </td>
                            <td class="input-td1">
                                <div class="form-group ">
                             
                                    <select class="form-control form-control-sm border bg-light-subtle" name="details[0][blind_type]">
                                        <option value="wand">Wand</option>
                                        <option value="string" selected>String</option>
                                        <option value="motorized">Motorized</option>
                                        <option value="touchless">Touchless</option>
                                    </select>
                          </div>
                            </td>
                            <td class="input-td1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="details[0][mount_type]" id="inside-mount-1" value="inside">
                                    <label class="form-check-label" for="inside-mount-1">Inside Mount</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="details[0][mount_type]" id="outside-mount-1" value="outside">
                                    <label class="form-check-label" for="outside-mount-1">Outside Mount</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="cut-button"> <button type="button" class="justify-content-center d-flex align-items-center btn btn-danger btn-sm remove-row-btn ">&times;</button></div>
                                    <textarea class="form-control border bg-light-subtle " id="notes-1" name="details[0][notes]" rows="5"></textarea>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="mb-1"><button type="button" class="btn btn-primary" id="add-row-btn">Add Row</button></div>
                <div><button type="submit" class="btn btn-success">Submit</button></div>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-2YkNaXbA+z+4VGHPmfHGql9aF8x/5Qj3bzKzN5k8H1bd1nltgQJDhqlsF4vdVUD5" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var rowIndex = 1;

        // Function to add a new row
        function addRow() {
            rowIndex++;
            var tbody = document.querySelector('table tbody');
            var newRow = document.createElement('tr');
            newRow.classList.add('detail-outer');
            newRow.innerHTML = `
                <td>${rowIndex}</td>
                <td>
                    <div class="form-group ">
                        <div><input type="text" class="form-control form-control-sm small-input border bg-light-subtle" id="room-name-${rowIndex}" name="details[${rowIndex - 1}][room_name]"></div>
                    </div>
                    <div class="form-group  mt-3">
                        <label for="quantity-${rowIndex}">Quantity</label>
                        <input type="text" class=" mt-1 form-control form-control-sm border bg-light-subtle" id="quantity-${rowIndex}" name="details[${rowIndex - 1}][quantity]">
                    </div>
                </td>
                <td class="input-td-cassette">
                    <div class="form-group ">
                        <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" id="fabric-name-${rowIndex}" name="details[${rowIndex - 1}][fabric_name]">
                    </div>
                </td>
                <td class="input-td1">
                    <div class="form-group ">
                        <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" id="cassette-type-${rowIndex}" name="details[${rowIndex - 1}][cassette_type]">
                    </div>
                </td>
                <td class="input-td1">
                        <div class="form-group ">
                            <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" id="top-width-${rowIndex}" name="details[${rowIndex - 1}][top_width]">
                        </div>
                </td>
                <td class="input-td1">
                        <div class="form-group ">
                            <input type="text" class="form-control form-control-sm small-input border bg-light-subtle" id="left-height-${rowIndex}" name="details[${rowIndex - 1}][left_height]">
                        </div>
                </td>
                <td class="input-td1">
                    <div class="form-group ">
                        <select class="form-control form-control-sm border bg-light-subtle" name="details[${rowIndex - 1}][blind_type]">
                            <option value="wand">Wand</option>
                            <option value="string" selected>String</option>
                            <option value="motorized">Motorized</option>
                            <option value="touchless">Touchless</option>
                        </select>
                    </div>
                </td>
                <td class="input-td1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="details[${rowIndex - 1}][mount_type]" id="inside-mount-${rowIndex}" value="inside">
                        <label class="form-check-label" for="inside-mount-${rowIndex}">Inside Mount</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="details[${rowIndex - 1}][mount_type]" id="outside-mount-${rowIndex}" value="outside">
                        <label class="form-check-label" for="outside-mount-${rowIndex}">Outside Mount</label>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <div class="cut-button "><button type="button" class="justify-content-center d-flex align-items-center btn btn-danger btn-sm remove-row-btn">&times;</button></div>
                        <textarea class="form-control border bg-light-subtle" id="notes-${rowIndex}" name="details[${rowIndex - 1}][notes]" rows="5"></textarea>
                    </div>
                </td>
            `;
            tbody.appendChild(newRow);
        }
     
        document.getElementById('add-row-btn').addEventListener('click', addRow);
        
        document.addEventListener('click', function (event) {
            if (event.target && event.target.classList.contains('remove-row-btn')) {
                event.target.closest('tr').remove();
            }
        });
    });
</script>