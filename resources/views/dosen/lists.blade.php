<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of Dosens</title>

    <!-- Add Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Add Tailwind -->
</head>
<body>
    <div class="main-container">
        <h1 class="tanggal">
            {{ \Carbon\Carbon::now()->isoFormat('dddd') }}
            {{" ".date("d F Y");}}
        </h1>
        <div class="card card-dosen" >
            <table class="table table-flush dataTable-table" id="users-list">
                <thead class="thead-light">
                    <tr>
                        <th data-sortable="" style="width: 11.2641%;"><a href="#" class="dataTable-sorter">NAME</a></th>
                        <th data-sortable="" style="width: 19.9625%;"><a href="#" class="dataTable-sorter">EMAIL</a></th>
                        <th data-sortable="" style="width: 11.2641%;"><a href="#" class="dataTable-sorter">Inisial</a></th>
                        <th data-sortable="" style="width: 10.4506%;"><a href="#" class="dataTable-sorter">ACTION</a></th>
                    </tr>
                </thead>
                <tbody>
            @for ($i=0; $i<count($dosens); $i+=1)
                    <tr>
                        <td class="text-sm">{{ $dosens[$i]->nama; }}</td>
                        <td class="text-sm">{{ $dosens[$i]->email; }}</td>
                        <td class="text-sm">{{ $dosens[$i]->inisial_dosen; }}</td>
                        <td class="text-sm">
                            <a href=" ../dosen/{{ $dosens[$i]->email }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                <i class="fas" aria-hidden="true">
                                    &#xf044;
                                </i>
                            </a>
                            <span" data-bs-toggle="tooltip" data-bs-original-title="Disabled">

                            </span">
                        </td>
                    </tr>

                    @endfor
                </tbody>
            </table>
        </div>
        {{-- Script untuk Navigasi V --}}

</body>
</html>
