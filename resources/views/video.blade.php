<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit parser Page</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
    <div>
        <a href="{{ route('index') }}"> << GO TO PARSER VIDEO FORM <<  </a><br>
    </div><br>
    <div>
        <a href="{{ route('show') }}"> << GO TO PARSER VIDEO LIST <<  </a><br>
    </div><br>
    <div class="content">
                    <p> Video # {{ $parser->id  }}</p>
                    <iframe id="ytplayer" type="text/html" width="640" height="360"
                            src="{{ $parser->video_url }}"
                            frameborder="0" >
                    </iframe>
                    <br>
                    <p>{{ $parser->title }}</p>
                    <form action="{{ route('edit') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="id" hidden="true" value = "{{ $parser->id }}">
                        <input type="text" name="title" style="width:700px;height:35px;font-size: 15px" >
                        <input type="submit" style="width:100px;height:40px;font-size: 15px" value="Add new title">
                    </form>

                    <p>{{ $parser->description }}</p>
                    <p>{{ $parser->image_url }}</p><br>
    </div>
</body>
</html>
