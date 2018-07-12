@extends('layouts.app')

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Parser video servise CubeX</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>

@section('content')

    <div>
        <a href="{{ route('show') }}"> << GO TO PARSER VIDEO LIST <<  </a><br>
    </div><br>
    <div class="flex-center position-ref full-height">

        <div class="content">

            <div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('store')}}" id="contactform" method="POST" class="validateform">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-4 field">
                            <input type="text" style="width:500px;height:30px;font-size: 20px;" name="url" placeholder="* Введите URL видеосервиса" required />
                            <p>
                                <button style="width:100px;height:50px" class="btn btn-theme margintop10 pull-left" type="submit">Парсить</button>
                            </p>
                        </div>

                    </div>
                </form>

                @if (session('status'))
                    <div class="alert alert-error">
                        {{ session('status') }}
                    </div>
                @endif

            </div>

        </div>
    </div>

@endsection
