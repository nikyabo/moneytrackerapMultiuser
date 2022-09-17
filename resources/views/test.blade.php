<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/19d82403b1.js" crossorigin="anonymous"></script><!-- font awesome -->
  @vite('resources/css/app.css')

</head>
<body class="bg-white">
   <div class="container">
        <form action="{{route('store')}}" method="POST">
        <input type="hidden" name="amount" value="50">
        <input type="hidden" name="content" value="Hello there">
        <input type="hidden" name="category" value="{{ auth()->user->id }}">
        <button type="submit">Test</button>
        </form>
   </div> 

</body>
</html>