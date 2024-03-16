@extends('layouts.app')
@section('content')



<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('Pages-text.Competences list') }}</h1>
            </div>
            <div class="col-sm-6">
                <div class="float-sm-right">
                    
                    @can('create-CompetencesController')
                    <a href="{{route('competences.create')}}" class="btn btn-info btnAdd"><i class="fas fa-plus"></i> {{ __('Pages-text.Create a Competence') }}</a>
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

                        <div class="d-flex justify-content-between">
                  

                            <div style="margin-top:1px;">
                                <!-- Set width for select element -->
                                <select id="filter_by_modules" class="form-select"  style="width:250px;" name="module">
                                    <option value="">{{ __('Pages-text.All Modules') }}</option>
                                    @foreach($modules as $module)
                                        {{-- Check if the current module is the selected module --}}
                                        @php $selected = ($module->Name == $ModuleName) ? 'selected' : ''; @endphp
                                        <option value="{{ $module->Name }}" {{$selected}}>{{ $module->Name }}</option>
                                    @endforeach
                                </select>           
                                
                            </div>
                            


                            <div class="p-0">
                                <div class="input-group input-group-sm ">
                                    <input type="text" id="searchInput" name="table_search" class="form-control"
                                        placeholder="{{ __('Pages-text.Search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>



                       
                    </div>

                    <div id="resulthtml">
                        @include('competences.competenceTablePartial')
                  </div>
                </div>

            </div>
        </div>
    </div>

</section>

@endsection

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src=" https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js "></script>
<script>


$(document).ready(function() {
    $(document).on('click', '.delete-competence', function () {
        var competenceId = $(this).data('competence-id');
        var competenceName = $(this).data('competence-title'); // Retrieve competence name

        console.log(competenceId);
        console.log(competenceName); // Log the competence name to verify

        var deleteUrl = "{{ route('competences.destroy', ':id') }}";
        deleteUrl = deleteUrl.replace(':id', competenceId);
        console.log(deleteUrl);

      
            $('#modal-default .competences_modal').html(`
            <div>
            {{ __('Pages-text.If you are sure you want to delete this competence') }}
            <strong>"${competenceName}"</strong>
            {{ __('Pages-text.click Delete to continue') }}
            </div>
            `);

        // Update form action URL
        $('#deleteForm').attr('action', deleteUrl);
    });
});



  
const tableContainer = $('#table-container');
    var searchQuery = '';
    const search = (query = '', page = 1) => {
        $.ajax('{{ route('competences.index') }}', {
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
        $('#resulthtml').html(html); 
        updatePaginationLinks();
        console.log(html);
    } catch (error) {
        console.error('Error updating table:', error);
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

    $(document).ready(() => {
    // console.log('hey')
  
        $('#filter_by_modules').on('input', function() {
            searchQuery = $('#filter_by_modules').val();
            // searchQuery = $(this).val();
           console.log(searchQuery)

            search(searchQuery);
        });

        updatePaginationLinks();
        
    });
</script>


