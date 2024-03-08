@extends('layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Pages-text.Add stagiaire') }}</h1>
          </div>
  
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ __('Pages-text.Add stagiaire') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('stagiaires.store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="Name">{{ __('Pages-text.stagiaire Name') }}</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="Name" placeholder="{{ __('Pages-text.Enter stagiaire Name') }}">
                    <div style="color:red">
                        @error("name")
                        {{$message}}
                        @enderror
                        </div>
                  </div>
                  <input type="hidden" value="stagiaire" name="role">

                  <div class="form-group">
                    <label for="email">{{ __('Pages-text.stagiaire Email') }}</label>
                    <input type="text" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="{{ __('Pages-text.Enter stagiaire Email') }}">
                    <div style="color:red">
                        @error("email")
                        {{$message}}
                        @enderror
                        </div>
                    
                  </div>
               
                  <div class="form-group">            
                    <label for="password">{{ __('Pages-text.Password') }}</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Pages-text.Enter stagiaire Password') }}" required autocomplete="new-password" />
                    @if($errors->has('password'))
                     <div class="text-danger">
                        {{ $errors->first('password') }}
                    </div>
                    @endif   
              </div>
        
        
              <div class="form-group">                  
                <label for="password_confirmation">{{ __('Pages-text.Confirm Password') }} </label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Pages-text.Confirm Password') }}" value="{{old('password_confirmation')}}" required autocomplete="new-password" />
                @if($errors->has('password_confirmation'))
                 <div class="text-danger">
                    {{ $errors->first('password_confirmation') }}
                </div>
                @endif   
          </div>
               
        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{ __('Pages-text.Add stagiaire') }}</button>
           
                    <a href="{{route('stagiaires.index')}}" type="submit" class="btn btn-secondary">{{ __('Pages-text.Cancel') }}</a>
  
                </div>
              </form>
            </div>
        </div>
    </div>
    </section>


            <!-- /.card -->

@endsection
