@extends('layouts.admin')

@section('content')
<style>
    .card {
        background-color: #181818;
        border-radius: 15px;
        color: white;
        overflow: hidden;
    }
    .card-img-top {
        background-color: #b4ff00;
        padding: 20px;
    }
    .badge-new {
        background-color: #ff0099;
        color: white;
        font-weight: bold;
        margin-left: 5px;
        border-radius: 5px;
        padding: 3px 8px;
        font-size: 12px;
    }
    .tag-button {
        background-color: #333;
        color: white;
        border-radius: 20px;
        padding: 5px 10px;
        font-size: 12px;
        text-decoration: none;
        margin-right: 5px;
    }
    h4 {
        font-weight: bold;
    }
</style>
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Kunjungan</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Kunjungan</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data Kunjungan</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ">
                <input type="text" id="search" class="form-control mb-4" placeholder="Search...">
            </div>
        </div>
        <div id="results" class="row">
            @include('partials.kunjungan-cabang-list', ['kunjungans' => $kunjungans])
        </div>
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                @if ($kunjungans->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $kunjungans->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                @endif

                @for ($i = 1; $i <= $kunjungans->lastPage(); $i++)
                    <li class="page-item {{ ($kunjungans->currentPage() == $i) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $kunjungans->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if ($kunjungans->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $kunjungans->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">&raquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
@endsection

@push('add-scripts')
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var query = $(this).val();

            $.ajax({
                url: "{{ route('kunjungancabang.search') }}",
                type: "GET",
                data: { query: query },
                success: function(data) {
                    $('#results').html(data);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
@endpush
