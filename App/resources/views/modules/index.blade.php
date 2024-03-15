@extends('layouts.app')
@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Pages-text.Projects list') }}</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        @can('create-ModulesController')
                        <a href="{{route('modules.create')}}" class="btn btn-primary btnAdd">{{ __('Pages-text.Create a Module') }}</a>
                   @endcan
                    </div>

                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            
        @if(session('success'))
        <div class="alert alert-success">
       {{ session('success') }}
        </div>     
          @endif  
          @if(session('error'))
          <div class="alert alert-danger">
         {{ session('error') }}
          </div>
          
            @endif 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header col-md-12">
                            <div class=" p-0">
                                <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                    <input type="text" name="search" class="form-control float-right"
                                     id="searchInput" placeholder="{{ __('Pages-text.Search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                   
                        <div id="resulthtml">
                            @include('modules.moduleTablePartial')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

$(document).ready(function() {
    $(document).on('click', '.delete-module', function () {
        var moduleId = $(this).data('module-id');
        var moduleName = $(this).data('module-name'); // Retrieve module name
        console.log(moduleId);
        console.log(moduleName); // Log the module name to verify

        var deleteUrl = "{{ route('modules.destroy', ':id') }}";
        deleteUrl = deleteUrl.replace(':id', moduleId);
        console.log(deleteUrl);

        // Update modal content with the module name
        $('#modal-default .modal-body').html(`
    <div>
        {{ __('Pages-text.Are you sure you want to delete this module') }}
        <strong>"${moduleName}"</strong>
        {{ __('Pages-text.Click delete to procced to delete this module') }}
    </div>
`);
        
        // Update form action URL



        $('#deleteForm').attr('action', deleteUrl);
    });
});


    // const tableContainer = $('#table-container');
    var searchQuery = '';
    const search = (query = '', page = 1) => {
        $.ajax('{{ route('modules.index') }}', {
            data: {
                query: query,
                page: page
            },
            success: (data) => updateTable(data)
        });
        history.pushState(null, null, '?query=' + query + '&page=' + page);
    };



const updateTable = (html) => {
    try {
        $('#resulthtml').html(html); // Target the tbody element and update its content
        updatePaginationLinks();
        // console.log(html);
    } catch (error) {
        // console.error('Error updating table:', error);
    }
};


const updatePaginationLinks = () => {
    // console.log('updatePaginationLinks');

            $('button[page-number]').each(function() {
                $(this).on('click', function() {
                // console.log('click');

                    pageNumber = $(this).attr('page-number')
                    search(searchQuery, pageNumber)
                })
            })
        }
     

    $(document).ready(() => {
    // console.log('hey')

        
        $('#searchInput').on('input', function() {
            searchQuery = $('#searchInput').val();
            // searchQuery = $(this).val();
    console.log(searchQuery)

            search(searchQuery);
        });

        updatePaginationLinks();
    });
  
    
   

</script>