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
        <div class="d-flex justify-content-between pl-0">
            <div>
                <h2 class="mb-4">Create service</h2>
            </div>
            <div>
                <a href="/services" type="button" class="btn text-white ml-auto"><i class="fas fa-arrow-left"></i> List of services</a>
            </div>
        </div>
        <form method="POST" action="/services">
            @csrf

            @if ($errors->any())
                <div class="row mb-1">
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="form-group row mb-1">
                <label class="col-sm-3 col-form-label" for="formGroupNameInput">Name</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" id="formGroupNameInput" placeholder="Name"
                           value="{{ old('name') }}">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label class="col-sm-3 col-form-label" for="formGroupUnitPriceInput">Unit price</label>
                <div class="col-sm-9">
                    <input type="number" name="unit_price" class="form-control" id="formGroupUnitPriceInput" placeholder="Unit price"
                           value="{{ old('unit_price') }}">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label class="col-sm-3 col-form-label" for="formGroupBillingInput">Billing</label>
                <div class="col-sm-9">
                    <select class="form-control" id="formGroupBillingInput" name="billing">
                        <option value="">-</option>
                        <option value="monthly" {{ old('billing') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                        <option value="quarterly" {{ old('billing') == 'quarterly' ? 'selected' : '' }}>Quarterly</option>
                        <option value="semi-annually" {{ old('billing') == 'semi-annually' ? 'selected' : '' }}>Semi Annually</option>
                        <option value="annually" {{ old('billing') == 'annually' ? 'selected' : '' }}>Annually</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label class="col-sm-3 col-form-label" for="formGroupStartInput">Start of service</label>
                <div class="col-sm-9">
                    <input type="date" name="start" class="form-control" id="formGroupStartInput"
                           value="{{ old('start') }}">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label class="col-sm-3 col-form-label" for="formGroupEndInput">End of service</label>
                <div class="col-sm-9">
                    <input type="date" name="end" class="form-control" id="formGroupEndInput"
                           value="{{ old('end') }}">
                </div>
            </div>

            <div class="form-group row mb-1">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9 d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>
