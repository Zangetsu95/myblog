@extends('base')

@section('content')
    <div class="container">
        <h1 class="text-center mt-5">Editer votre article</h1>
        <form method="POST" action="{{route('articles.update',$article->id)}}">
            @method('PUT')
            @csrf
            <div class="col-12">
                <div class="form-group">
                    <label>Titre</label>
                    <input type="text" value="{{ $article->title }}" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Titre de votre aricle"/>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Sous-Titre</label>
                    <input type="text"  value="{{ $article->subtitle }}" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" placeholder="Titre de votre aricle"/>
                    <small class="form-text text-muted">Décrivez le contenu de votre article , le thème traité</small>
                    @error('subtitle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Contenu</label>
                    <textarea id="tinycme-editor" name="content" class="form-control w-100 @error('content') is-invalid @enderror">
                         {{ $article->content }}
                    </textarea>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <script>
                    tinymce.init({
                        selector: '#tinycme-editor'
                    });
                </script>
            </div>
            <div class="d-flex justify-content-center mb-5">
                <button type="submit" class="btn btn-primary">Modifier l'article</button>
            </div>
        </form>
    </div>
@endsection
