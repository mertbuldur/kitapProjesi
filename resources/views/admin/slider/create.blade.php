@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @if(session("status"))
                        <div class="alert alert-primary" role="alert">
                            {{session("status")}}
                        </div>
                    @endif


                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Slider Ekle</h4>
                            <p class="category">Slider Oluşturunuz</p>
                        </div>
                        <div class="card-content">
                            <form enctype="multipart/form-data" action="{{route('admin.slider.create.post')}}" method="POST">
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <input style="opacity: 1;position:inherit" type="file" name="image">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Slider Ekle</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection