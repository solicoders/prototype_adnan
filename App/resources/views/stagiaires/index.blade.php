@extends('layouts.app')
@section('content')
    
<!-- Content Wrapper. Contains page content -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Pages-text.Stagiaires list') }}</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="{{route('stagiaires.create')}}" class="btn btn-info btnAdd">  <i class="fas fa-plus"></i> {{ __('Pages-text.Create a Stagiaire') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header   -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
       {{ session('error') }}
        </div>
        
          @endif 
            <!-- Small boxes (Stat box) -->
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
                    @include('stagiaires.stagiairesTablePartial')
                </div>

              </div>
         
            </div>
        
              
    </section>
    <!-- /.content -->


@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
 


$(document).ready(function() {
    $(document).on('click', '.delete-stagiaire', function () {
        var stagiaireId = $(this).data('stagiaire-id');
        var stagiaireName = $(this).data('stagiaire-name'); // Retrieve stagiaire name
        console.log(stagiaireId);
        console.log(stagiaireName); // Log the stagiaire name to verify

        var deleteUrl = "{{ route('stagiaires.destroy', ':id') }}";
        deleteUrl = deleteUrl.replace(':id', stagiaireId);
        console.log(deleteUrl);

        // Update modal content with the stagiaire name
        $('#modal-default .modal-body').html(`
    <div>
        {{ __('Pages-text.if you are sure you want to delete this stagiaire') }}
        <strong>"${stagiaireName}"</strong>
        {{ __('Pages-text.Click the Delete button to continue') }}
    </div>
`);        
        // Update form action URL
        $('#deleteForm').attr('action', deleteUrl);
    });
});


    // const tableContainer = $('#table-container');
    var searchQuery = '';
    const search = (query = '', page = 1) => {
        $.ajax('{{ route('stagiaires.index') }}', {
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
