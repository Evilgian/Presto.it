<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>Presto!</title>
  </head>
  <body>
        <x-navbar/>
        {{$slot}}
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="/js/app.js"></script>
  </body>
</html>