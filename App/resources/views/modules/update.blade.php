@extends('layouts.app')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Pages-text.Modify Module') }}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <!-- general form elements -->
            <div class="col-md-12 card card-info px-0">
              <div class="card-header">
                <h3 class="card-title">{{ __('Pages-text.Edit Module') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('modules.update', $module->id)}}">
                @csrf
                @method("PUT")
                <div class="card-body">
                  <div class="form-group">
                    <label for="Name">{{ __('Pages-text.Module Name') }}</label>
                    <input type="text" class="form-control" value="{{ $module->Name }}" name="name" id="Name" placeholder="{{ __('Pages-text.Enter Module Name') }}">
                    <div style="color:red">
                        @error("name")
                        {{$message}}
                        @enderror
                        </div>
                  </div>

          

                  <div class="form-group">
                    <label for="start_date">{{ __('Pages-text.Start date') }}</label>
                    <input type="date" class="form-control" value="{{$module->Start_Date }}" name="start_date" id="start_date" placeholder="saisir la Date de Début">
                    <div style="color:red">
                        @error("start_date")
                        {{$message}}
                        @enderror
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="end_date">{{ __('Pages-text.End date') }}</label>
                    <input type="date" class="form-control" value="{{$module->End_Date}}" name="end_date" id="end_date" placeholder="saisir la date de fin">
                    <div style="color:red">
                      @error("end_date")
                      {{$message}}
                      @enderror
                      </div>
                  </div>
               
                  <div class="form-group">
                    <label for="description">{{ __('Pages-text.Module Description') }}</label>
                    
                    <input type="text" class="form-control" value="{{ $module->Description }}" id="description" name="description" placeholder="{{ __('Pages-text.Enter Module Description') }}">
                    <div style="color:red">
                        @error("description")
                        {{$message}}
                        @enderror
                        </div>               
                  </div>
               


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">{{ __('Pages-text.Edit Module') }}</button>
           
                    <a href="{{route('modules.index')}}" type="submit" class="btn btn-secondary">{{ __('Pages-text.Cancel') }}</a>
  
                </div>
              </form>
            </div>
        </div>
    </div>
    </section>


            <!-- /.card -->

@endsection
