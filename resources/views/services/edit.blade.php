<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Homework</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <style>
        .container {
            padding-top: 50px;
        }

        body {
            background-color: rgba(26, 32, 44);
        }
    </style>

</head>
<body class="text-white">
<div class="container">
    <div class="row">
        <h2 class="mb-4">Edit the service {{ $service->id }}</h2>

        <form method="POST" action="/services/{{ $service->id }}">
            @method('PUT')
            @csrf

            <div class="form-group row mb-1">
                <label class="col-sm-2 col-form-label" for="formGroupNameInput">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="formGroupNameInput" placeholder="Name" value="{{ $service->name }}">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label class="col-sm-2 col-form-label" for="formGroupUnitPriceInput">Unit price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="formGroupUnitPriceInput" placeholder="Unit price" value="{{ $service->unit_price }}">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label class="col-sm-2 col-form-label" for="formGroupUnitPriceInput">Billing</label>
                <div class="col-sm-10">
                    <select class="form-control" id="formGroupUnitPriceInput" name="UnitPrice">
                        <option value="">-</option>
                        <option value="monthly" {{ $service->billing == 'monthly' ? 'selected' : '' }}>Monthly</option>
                        <option value="quarterly" {{ $service->billing == 'quarterly' ? 'selected' : '' }}>Quarterly</option>
                        <option value="semi-annually" {{ $service->billing == 'semi-annually' ? 'selected' : '' }}>Semi Annually</option>
                        <option value="annually" {{ $service->billing == 'annually' ? 'selected' : '' }}>Annually</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label class="col-sm-2 col-form-label" for="formGroupUnitPriceInput">Start of service</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="formGroupUnitPriceInput" value="{{ $service->start }}">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label class="col-sm-2 col-form-label" for="formGroupUnitPriceInput">End of service</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="formGroupUnitPriceInput" value="{{ $service->end }}">
                </div>
            </div>

        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>
