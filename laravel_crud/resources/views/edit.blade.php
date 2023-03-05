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
                <a href="{{url('articles')}}" class="btn btn-primary">BACK</a>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Article</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{url('articles/edit/'.$article->id)}}" method="post" name="addArticle" id="addArticle">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" id="title" value="{{old('title',$article->title)}}" class="form-control {{($errors->any() && $errors->first('title')) ? 'is-invalid' : ''}}">

                                @if($errors->any())

                                <p class="invalid-feedback">{{$errors->first('title')}}</p>

                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Desrciption</label>
                                <textarea name="desrciption" id="desrciption" cols="30" rows="2" class="form-control {{($errors->any() && $errors->first('desrciption')) ? 'is-invalid' : ''}}">{{old('desrciption',$article->desrciption)}}</textarea>

                                @if($errors->any())

                                <p class="invalid-feedback">{{$errors->first('desrciption')}}</p>

                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Author</label>
                                <input type="text" name="author" id="author" value="{{old('author',$article->author)}}" class="form-control {{($errors->any() && $errors->first('author')) ? 'is-invalid' : ''}}">

                                @if($errors->any())

                                <p class="invalid-feedback">{{$errors->first('author')}}</p>

                                @endif
                            </div>
                            <div class="form-gruop">
                                <button type="submit" name="submit" class="btn btn-primary">Update Article</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>