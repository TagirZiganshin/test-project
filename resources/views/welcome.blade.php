<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title", "Document")</title>
    <link href={{asset("/public/dist/css/bootstrap.min.css")}} rel="stylesheet"/>
</head> 
<body>
    @include("components.header")
    @yield("content")
    <script src={{asset("/public/dist/js/bootstrap.bundle.min.js")}}></script>
</body>
</html>