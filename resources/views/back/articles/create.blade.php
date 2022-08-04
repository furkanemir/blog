@extends('back.layouts.master')
@section('title','Makale oluştur')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
           <div class="alert alert-danger">
               @foreach($errors->all() as $error)
                 <li>{{$error}}</li>
               @endforeach
           </div>
            @endif
            <form method="post" action="{{route('admin.makaleler.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                   <label>Makale başlığı</label>
                    <input type="text" name="title" class="form-control" required></input>
               </div>
                <div class="form-group">
                    <label>Makale kategorisi</label>
                    <select class="form-control" name="category" required>
                    <option value="">seçim yapınız</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label>Makale fotoğrafı</label>

                        <input type="file" name="image[]" class="form-control" multiple required></input>

                    </div>
                    <div class="form-group">
                        <label>Makale içeriği</label>
                        <textarea id="editor" name="content" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-primary btn-block">Makaleyi oluştur</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    @endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#editor').summernote(
                {
                    'height':300
                }
            );
        });

    </script>
@endsection
