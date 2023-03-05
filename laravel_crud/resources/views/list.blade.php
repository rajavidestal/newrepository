<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
</head>

<body class="bg-light">
    <div class="p-3 mb-2 bg-dark text-white">
        <div class="container">
            <div class="h3">Laravel CRUD</div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <!-- <a href="{{url('articles/add')}}" class="btn btn-primary">ADD</a> -->
                <a href="{{route('article.add')}}" class="btn btn-primary">ADD</a>
            </div>

            @if(Session::has('msg'))
            <div class="col-md-12">
                <div class="alert alert-success">{{Session::get('msg')}}</div>
            </div>
            @endif

            @if(Session::has('errorMsg'))
            <div class="col-md-12">
                <div class="alert alert-danger">{{Session::get('errorMsg')}}</div>
            </div>
            @endif

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Article</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Created</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($articles)
                                @foreach($articles as $article)
                                <tr>
                                    <td>{{$loop->iteration}}</td>                                
                                    <td>{{$article->title}}</td>
                                    <td>{{$article->author}}</td>
                                    <td>{{$article->created_at}}</td>
                                    <td><a href="{{url('articles/edit/'.$article->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td><a href="{{url('articles/delete/'.$article->id)}}" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6">Articles not added yet.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>