<!doctype html>
<html
    lang="en-US" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domain Management System
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>
<body class="h-full dark:bg-gray-900">

    <div class="min-h-full">
        <table style="border: 1px solid black; border-collapse: collapse;">
            <thead>
                <tr>
                    <th colspan="10" style="text-align: center; font-weight: bold; font-size: 20px;">Domains Report</th>
                </tr>
                
                <tr>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">No</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">ID Domain</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">Name</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">Description</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">Url</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">Application Type</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">Port</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">HTTP Status</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">Server</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">Unit</th>
                </tr>
            </thead>
            <tbody>
                @if ($domains->count())
                    @foreach($domains as $domain)
                    <tr>
                        <td style="border: 1px solid black;">{{ $loop->iteration }}</td>
                        <td style="border: 1px solid black;">{{ $domain->id }}</td>
                        <td style="border: 1px solid black;">{{ $domain->name }}</td>
                        <td style="border: 1px solid black;">{{ $domain->description }}</td>
                        <td style="border: 1px solid black;">{{ $domain->url }}</td>
                        <td style="border: 1px solid black;">{{ $domain->application_type }}</td>
                        <td style="border: 1px solid black;">{{ $domain->port }}</td>
                        <td style="border: 1px solid black;">{{ $domain->http_status }}</td>
                        <td style="border: 1px solid black;">{{ $domain->server->name }}</td>
                        <td style="border: 1px solid black;">{{ $domain->server->unit->name }}</td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10" style="border: 1px solid black; text-align: center;">No Data Found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

</body>
</html>
