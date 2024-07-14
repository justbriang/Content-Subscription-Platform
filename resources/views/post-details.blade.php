@section('title', $post->title)

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ $post->title }}</h1>
                    </div>
                    <div class="card-body">
                        <p>{!! nl2br(e($post->content)) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="post-container">
        <h1 class="post-title">{{ $post->title }}</h1>
        <p class="post-date">Published on {{ $post->created_at }}</p>

        <div class="post-content">
            <p>{{ $post->content }}</p>
        </div>
    </div>
</body>

</html>
