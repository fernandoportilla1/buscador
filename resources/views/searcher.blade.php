<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buscador</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <style>
        #searcher {
            margin-top: 100px;
        }
    </style>
    
    <div class="container">
        <div class="row justify-content-center">
            <div id="searcher" class="col-sm-6">
                <form action="{{ route('searcher') }}" class="form-inline">
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="text" name="q" class="form-control" placeholder="Buscar .." value="{{ old('qsss') }}">
                  </div>
                  <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                </form>
            </div>
            
            @foreach($articles as $article)
            <div class="col-sm-8">
                <div class="card mt-2">
                    <div class="card-body">
                         <h5 class="card-title">{{ $article->title }}</h5>
                    </div>
                </div>
            </div>
            @endforeach 

        </div>
        
    </div>
</body>
</html>