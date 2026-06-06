<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>
  hello I'm {{ $name }}, I'm learning Laravel Framework.
  </h1>

  <form action="{{ url('hema') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Enter your name">
    <button type="submit">Submit</button>
  </form>
</body>
</html>