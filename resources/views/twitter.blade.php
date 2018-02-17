<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Tweetz</title>
  <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">MyTweetz</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
  <div class="container" style="margin-top: 15px;">
    <form class="well" action="{{route('post.tweet')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      @if(count($errors) > 0)
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
            {{$error}}
          </div>
        @endforeach
      @endif
      <div class="form-group">
        <label>Tweet Text</label>
        <input type="text" name="tweet" class="form-control">
      </div>
      <div class="form-group">
        <label>Upload Images</label>
        <input type="file" name="images[]" multiple class="form-control">
      </div>
      <div class="form-group">
        <button class="btn btn-success">Create Tweet</button>
      </div>
    </form>
    @if(!empty($data))
      @foreach($data as $tweet)
        <div class="card text-white bg-primary mb-3" style="max-width: 150rem;">
          <div class="card-body">
            <h3>{{$tweet['text']}}
              <i class="glyphicon glyphicon-heart"></i> {{$tweet['favorite_count']}}
              <i class="glyphicon glyphicon-repeat"></i> {{$tweet['retweet_count']}}
            </h3>
            @if(!empty($tweet['extended_entities']['media']))
              @foreach($tweet['extended_entities']['media'] as $image)
                <img src="{{$image['media_url_https']}}" style="width:100px;">
              @endforeach
            @endif
          </div>
        </div>
      @endforeach
    @else
      <p>No Tweets found</p>
    @endif
  </div>
</body>
</html>