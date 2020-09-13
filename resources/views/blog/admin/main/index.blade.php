@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Панель управления @endslot
            @slot('parent') Главная @endslot
            @slot('active') @endslot
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h4>Кол-во заказов: {{$countOrders}}</h4>
                        <p>New orders</p>
                    </div>
                    <div class="icon">
                        <i class="icon icon-bag"></i>
                    </div>
                    <a href="" class="small-box-footer">
                        More info
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h4>Кол-во продуктов: {{$countProducts}}</h4>
                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="icon icon-stats-bars"></i>
                    </div>
                    <a href="" class="small-box-footer">
                        More info
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h4>Кол-во юзеров: {{$countUsers}}</h4>
                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="icon icon-person-add"></i>
                    </div>
                    <a href="" class="small-box-footer">
                        More info
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h4>Кол-во категорий: {{$countCategories}}</h4>
                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="icon icon-pie-graph"></i>
                    </div>
                    <a href="" class="small-box-footer">
                        More info
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            @include('blog.admin.main.include.orders')
            @include('blog.admin.main.include.recently')
        </div>
    </section>

@endsection
