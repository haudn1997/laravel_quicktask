<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
@if (count($errors))
    <!-- Form Error List -->
    <div class="message">
        <strong>{{trans('message.errors')}}</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="errors">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

