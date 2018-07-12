<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>List parser video</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div>
            <a href="{{ route('index') }}"> << GO TO PARSER VIDEO FORM <<  </a><br>
        </div><br>
        <div class="title m-b-md">
            List parser video<br><br>
        </div>
        <div class="panel-body">
                @if ($parsers != NULL)
                    @foreach($parsers as $parser)
                    <p><a href="{{ route('video',[$parser->id]) }}"> EDIT Video </a>
                    <form action="{{ route('delete') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="id" hidden="true" value = "{{ $parser->id }}">
                        <input type="submit" value="DELETE">
                    </form>
                    </p>
                    <iframe id="ytplayer" type="text/html" width="640" height="360"
                            src="{{ $parser->video_url }}"
                            frameborder="0" >
                    </iframe>
                    <br>
                    <p>{{ $parser->title }}</p>
                    <p>{{ $parser->description }}</p>
                    <p>{{ $parser->image_url }}</p><br>

                    @endforeach
                @endif
        </div>
    </div>
</div>
</body>
</html>
