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
        <div class="d-flex justify-content-between">
            <div>
                <h2 class="mb-4">List of the services</h2>
            </div>
            <div>
                <a href="/services/create" type="button" class="btn text-white ml-auto"><i class="fas fa-plus"></i> Add Service</a>
                <a href="/services/mrr" type="button" class="btn text-white ml-auto"><i class="fas fa-calculator"></i> Count MRR</a>
            </div>
        </div>
        <table class="text-white table table-bordered">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Unit price</th>
                <th scope="col">Billing</th>
                <th scope="col">Start of service</th>
                <th scope="col">End of service</th>
                <th scope="col">Functions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->unit_price }}</td>
                    <td>{{ $service->billing }}</td>
                    <td>{{ \Carbon\Carbon::parse($service->start)->format('d.m.Y') }}</td>
                    <td>{{ $service->end ? \Carbon\Carbon::parse($service->end)->format('d.m.Y') : 'Indefinite' }}</td>
                    <td>
                        <a href="services/{{$service->id}}/detail" type="button" class="btn btn-outline-light" data-toggle="tooltip" data-placement="right" title="Detail">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="services/{{$service->id}}/edit" type="button" class="btn btn-outline-light" data-toggle="tooltip" data-placement="right" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form method="POST" style="display: inline" action="/services/{{ $service->id }}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-outline-light" data-toggle="tooltip" data-placement="right" title="Delete">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        <div style="padding-left: 0; padding-right: 0" class="btn-group col-2 " role="group">
            @if ($services->currentPage() > 1)
                <a href="{{ $services->previousPageUrl() }}" type="button" class="btn btn-outline-light"><i class="fas fa-arrow-left"></i></a>
            @else
                <a type="button" class="btn btn-outline-light disabled"><i class="fas fa-arrow-left"></i></a>
            @endif

            <button class="btn btn-outline-light disabled">
                {{ $services->currentPage() }} / {{ ceil($services->total()/5)}}
            </button>

            @if ($services->hasMorePages())
                <a href="{{ $services->nextPageUrl() }}" type="button" class="btn btn-outline-light"><i class="fas fa-arrow-right"></i></a>
            @else
                <a type="button" class="btn btn-outline-light disabled"><i class="fas fa-arrow-right"></i></a>
            @endif
        </div>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>
