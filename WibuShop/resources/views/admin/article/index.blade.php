@extends('admin.layouts.main')
@section('title', '')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Bài viết</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('article.create') }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th width="4%" class=" text-center">STT</th>
                                        <th>Tiêu đề</th>
                                        <th>Thumbnail</th>
                                        <th class="text-center">Danh mục</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center" >Ngày đăng</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$articles->isEmpty())
                                        @php $i = $articles->firstItem(); @endphp
                                        @foreach($articles as $article)
                                            <tr>
                                                <td class=" text-center" style="vertical-align: middle;">{{ $i }}</td>
                                                <td style="vertical-align: middle; width: 20%" >
                                                    <p>{{ $article->a_name }}</p>
                                                </td>
                                                <td style="vertical-align: middle; width:15%;">
                                                    @if(isset($article) && !empty($article->a_avatar))
                                                        <img src="{{ asset(pare_url_file($article->a_avatar)) }}" alt="" class="margin-auto-div img-rounded"  id="image_render" style="height: 80px; width:100%;">
                                                    @else
                                                        <img src="{{ asset('admin/dist/img/no-image.png') }}" alt="" class="margin-auto-div img-rounded"  id="image_render" style="height: 80px; width:100%;">
                                                    @endif
                                                </td>
                                                <td class=" text-center" style="vertical-align: middle;">
                                                    {{ isset($article->category) ? $article->category->c_name : '' }}
                                                </td>
                                                <td class=" text-center" style="vertical-align: middle;">{{ $actives[$article->a_active] }}</td>
                                                <td class=" text-center" style="vertical-align: middle;">{{ $article->created_at }}</td>
                                                <td class="text-center" style="vertical-align: middle;">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('article.update', $article->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm btn-delete btn-confirm-delete" href="{{ route('article.delete', $article->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php $i++ @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if($articles->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $articles->appends($query = '')->links() }}
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop
