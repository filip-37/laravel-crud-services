<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Homework - services</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <style>
        .container {
            padding-top: 50px;
        }

        .table, body {
            background-color: rgba(26, 32, 44);
        }
    </style>

</head>
<body class="text-white">
<div class="container">
    <div class="row mb-5">
        <div class="d-flex justify-content-between pl-0">
            <div>
                <h2 class="mb-4">Get MRR</h2>
            </div>
            <div>
                <a href="/services" type="button" class="btn text-white ml-auto"><i class="fas fa-arrow-left"></i> List of services</a>
            </div>
        </div>
        <form method="GET" action="/services/mrr">
            @csrf
            @if ($result > 0)
                <div class="row mb-1">
                    <div class="alert alert-success">
                        <ul class="mb-0">
                            <li>MRR for {{ \Carbon\Carbon::parse($date)->format('d.m.Y') }} is {{ number_format($result, 2, '.', ' ') }}</li>
                        </ul>
                    </div>
                </div>
            @endif
            @if ($result <= 0)
                <div class="row mb-1">
                    <div class="alert alert-info">
                        <ul class="mb-0">
                            @if ($result == 0)
                                <li> No MRR for {{ \Carbon\Carbon::parse($date)->format('d.m.Y') }}</li>
                            @elseif ($result < 0)
                                <li>Select a date.</li>
                            @endif
                        </ul>
                    </div>
                </div>
            @endif


            <div class="form-group row mb-1">
                <label class="col-sm-2 col-form-label" for="formGroupDateInput">Date</label>
                <div class="col-sm-10">
                    <input type="date" name="date" class="form-control" id="formGroupDateInput"
                           value="{{ old('date') }}">
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
