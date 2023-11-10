@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Посты</a></li>
                            <li class="breadcrumb-item active">Добавить</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">

                        <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" value="{{old('title')}}" class="form-control w-25" name='title'
                                       placeholder="Введи название поста...">
                                @error('title')
                                <div class="text-danger">
                                   {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">

                                <textarea id="summernote" name="content">{{old('content')}}</textarea>

                                @error('content')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-group w-50">
                                    <label for="exampleInputFile">Добавить превью</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="preview_img">
                                            <label class="custom-file-label">Выберите картинку</label>

                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузка</span>
                                        </div>
                                    </div>
                                    @error('preview_img')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group w-50">
                                    <label for="exampleInputFile">Добавить картинку</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="main_img">
                                            <label class="custom-file-label">Выберите файл</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузка</span>
                                        </div>
                                    </div>
                                    @error('main_img')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <div class="form-group">
                                        <label>Выберите категорию</label>
                                        <select name="category_id" class="custom-select">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"
                                                    {{$category->id == old('category_id')? 'selected' : ''}}
                                                >{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group w-50">
                                    <label>Тэги</label>
                                    <select class="select2" name="tag_ids[]" multiple="multiple"
                                            data-placeholder="Выберите тэги"
                                            style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}"
                                                {{is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids'))? 'selected': ''}}
                                            >{{$tag->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('tag_ids')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <input type="submit" class="btn btn-primary" value="Добавить">

                            </div>

                        </form>
                    </div>

                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
