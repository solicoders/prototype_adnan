@extends('layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Pages-text.Module Details') }}</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header   -->

 
      <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-12">
                                <label for="nom">{{ __('Pages-text.Module Name') }} :</label>
                                <p>{{$module->Name}}</p>
                            </div>

                            <!-- Description Field -->
                            <div class="col-sm-12">
                                <label for="description">{{ __('Pages-text.Module Description') }} :</label>
                                <p>{{$module->Description}}</p>

                            </div>

                            <!-- Description Field -->
                            <div class="col-sm-12">
                                <label for="description">{{ __('Pages-text.Start date') }} :</label>
                                <p>{{$module->Start_Date}}</p>
                                <label for="description">{{ __('Pages-text.End date') }} :</label>
                                <p>{{$module->End_Date}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>




@endsection