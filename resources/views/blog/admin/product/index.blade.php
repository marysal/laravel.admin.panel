@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Список товаров @endslot
            @slot('parent') Главная @endslot
            @slot('active') Список товаров @endslot
        @endcomponent
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Категория</th>
                                    <th>Наименование</th>
                                    <th>Цена</th>
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($getAllProducts as $product)
                                    <tr @if($product->status == 0) style="font-weight: bold" @endif>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->cat}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>
                                            <a href="{{route('blog.admin.products.edit', $product->id)}}" title="редактировать продукс">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            @if($product->status == 0)
                                                <a class="delete" href="" title="Перевести статус = On">
                                                    <i class="fa fa-fw fa-close fa-refresh"></i>
                                                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            @else
                                                <a class="delete" href="" title="Перевести статус = Off">
                                                    <i class="fa fa-fw fa-close fa-close"></i>
                                                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            @endif

                                            @if($product)
                                                <a class="delete" href="" title="Удалить из ДБ">
                                                    <i class="fa fa-fw fa-close fa-close text-danger"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="3">
                                            <h2>Заказов нет</h2>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p>{{count($getAllProducts)}} заказа(ов) из {{$count}}</p>

                            @if($getAllProducts->total() > $getAllProducts->count())
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                {{$getAllProducts->links()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
