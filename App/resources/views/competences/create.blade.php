@extends('layouts.app')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Pages-text.Create a Competence for Module') }} </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
              <h3 class="card-title">{{ __('Pages-text.Create a Competence for Module') }} </h3>
              </div>
              <!-- .card-header -->
              <!-- form start -->
              <form method="post" action="{{route('competences.store')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">{{ __('Pages-text.Competence Title') }}</label>
                    <input type="text" class="form-control" value="{{ old('title') }}" name="title" id="title" placeholder="{{ __('Pages-text.Enter Competence Title') }}">
                    <div style="color:red">
                        @error("title")
                        {{$message}}
                        @enderror
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="description">{{ __('Pages-text.Competence Description') }}</label>
                    <input type="text" class="form-control" value="{{ old('description') }}" id="description" name="description" placeholder="{{ __('Pages-text.Enter Competence Description') }}">
                    <div style="color:red">
                        @error("description")
                        {{$message}}
                        @enderror
                        </div>                   
                  </div>

                  <label for="">Modules</label>
                  <select name="module_id" class="form-control">
                      <option selected>-- Select Modules --</option>
                      @foreach ($modules as $module)
                          <option value="{{ $module->id }}">{{ $module->Name }}</option>
                      @endforeach
                  </select>
               
               
        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">{{ __('Pages-text.Create Competence') }}</button>
           
                    <a href="{{route('competences.index')}}" type="submit" class="btn btn-secondary">{{ __('Pages-text.Cancel') }}</a>
  
                </div>
              </form>
            </div>
        
    </div>
    </section>



@endsection
