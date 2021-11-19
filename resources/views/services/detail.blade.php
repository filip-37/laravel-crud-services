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
                <h2 class="mb-4">Detail of the service</h2>
            </div>
            <div>
                <a href="/services" type="button" class="btn text-white ml-auto"><i class="fas fa-arrow-left"></i> List of services</a>
            </div>
        </div>

        <div class="row mb-1">
            <label class="col-sm-2">ID</label>
            <div class="col-sm-10">
                {{ $service->id }}
            </div>
        </div>
        <div class="row mb-1">
            <label class="col-sm-2">Name</label>
            <div class="col-sm-10">
                {{ $service->name }}
            </div>
        </div>
        <div class="row mb-1">
            <label class="col-sm-2 ">Unit price</label>
            <div class="col-sm-10">
                {{ $service->unit_price }}
            </div>
        </div>
        <div class=" row mb-1">
            <label class="col-sm-2">Billing</label>
            <div class="col-sm-10">
                {{ $service->billing }}
            </div>
        </div>
        <div class=" row mb-1">
            <label class="col-sm-2">Start of service</label>
            <div class="col-sm-10">
                {{ \Carbon\Carbon::parse($service->start)->format('d.m.Y') }}
            </div>
        </div>
        <div class=" row mb-1">
            <label class="col-sm-2">End of service</label>
            <div class="col-sm-10">
                {{ $service->end ? \Carbon\Carbon::parse($service->end)->format('d.m.Y') : 'Indefinite' }}
            </div>
        </div>
        <div class=" row mb-1">
            <label class="col-sm-2">Created at</label>
            <div class="col-sm-10">
                {{ \Carbon\Carbon::parse($service->created_at)->format('d.m.Y h:m:s') }}
            </div>
        </div>
        <div class=" row mb-1">
            <label class="col-sm-2">Updated at</label>
            <div class="col-sm-10">
                {{ \Carbon\Carbon::parse($service->updated_at)->format('d.m.Y h:m:s') }}
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>
