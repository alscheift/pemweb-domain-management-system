<!doctype html>
<html
    lang="en-US" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello
    </title>
    @vite('resources/css/app.css')
</head>
<body class="h-full">

<div class="min-h-full">
    {{$slot}}
</div>

</body>
</html>
