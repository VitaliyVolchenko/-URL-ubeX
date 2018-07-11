<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="content">
                    <p> Video # {{ $parser->id  }}</p>
                    <iframe id="ytplayer" type="text/html" width="640" height="360"
                            src="{{ $parser->video_url }}"
                            frameborder="0" >
                    </iframe>
                    <br>
                    <p>{{ $parser->title }}</p>
                    <p>{{ $parser->description }}</p>
                    <p>{{ $parser->image_url }}</p><br>

                    <form action="{{ route('delete') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="id" hidden="true" value = "{{ $parser->id }}">
                        <input type="submit" value="DELETE">
                    </form>
    </div>
</body>
</html>
