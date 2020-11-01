@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Добавление нового товара @endslot
            @slot('parent') Главная @endslot
            @slot('product') Список товаров @endslot
            @slot('active') Новый товар @endslot
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('blog.admin.products.store', $item->id)}}" method="post"
                          data-toggle="validator">
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Наименование товара</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       required value="{{old('title')}}">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <select name="parent-id" id="parent-id" class="form-control">
                                    <option>-- Выберите категорию --</option>
                                    @include('blog.admin.category.include.edit_categories_all_list', ['categories' => $categories])
                                </select>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="keywords">Ключевые слова</label>
                                <input type="text" name="keywords" class="form-control" id="keywords"
                                       placeholder="Ключевые слова"
                                       required value="{{old('keywords')}}">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="keywords">Описание</label>
                                <input type="text" name="description" class="form-control" id="description"
                                       placeholder="Описание"
                                       required value="{{old('description')}}">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="price">Цена</label>
                                <input type="text" name="price" class="form-control" id="price"
                                       placeholder="Цена" pattern="^[0-9.]{1,}$"
                                       data-error="Допускаются цифры и десятичная точка"
                                       required value="{{old('price')}}">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="old_price">Старая цена</label>
                                <input type="text" name="old_price" class="form-control" id="old_price"
                                       placeholder="Старая цена" pattern="^[0-9.]{1,}$"
                                       data-error="Допускаются цифры и десятичная точка"
                                       required value="{{old('old_price')}}">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="content">Контент</label>
                                <br>
                                <textarea name="content" id="editor1" cols="80" rows="10">{{old('content')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="status" checked> Статус
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="hit">
                                    <input type="checkbox" name="hit"> Хит
                                </label>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="related">Связанные товары</label>
                                <p><small>Начните вводить наименование товара</small></p>
                                <select name="related[]" class="select2 form-control" id="related" multiple></select>
                            </div>

                            <div class="form-group">
                                <label>Фильтры продукта</label>
                                {{Widget::run('filter', ['tpl' => 'widgets.filter', 'filter' => null,])}}
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    @include('blog.admin.product.include.image_single_create')
                                </div>
                                <div class="col-md-8">
                                    @include('blog.admin.product.include.image_gallery_create')
                                </div>
                            </div>

                        </div>

                        <input type="hidden" id="_token" value="{{ csrf_token() }}">

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection
