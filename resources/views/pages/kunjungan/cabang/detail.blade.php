@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="page-inner">
      <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Detail Kunjungan</h3>
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
                <a href="#">{{$kunjungan->nama_cabang}}</a>
              </li>
            </ul>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#unitKerjaModal">Tambah Unit Kerja</button>
        </div>
        <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="nama_cabang">Nama Cabang</label>
                    <input type="text" class="form-control" value="{{$kunjungan->nama_cabang}}" disabled>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="waktu_kunjungan">Waktu Kunjungan</label>
                    <input type="text" class="form-control" value="{{$kunjungan->waktu_kunjungan}}" disabled>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="kode_cabang">Kode Cabang</label>
                    <input type="text" class="form-control" value="{{$kunjungan->kode_cabang}}" disabled>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="waktu_kunjungan">PIC</label>
                    <input type="text" class="form-control" value="{{$kunjungan->pic}}" disabled>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <hr class="my-5">
                    <div class="table-responsive">
                        <table class="table mt-5">
                            <thead>
                                <tr>
                                    <th scope="col" style="font-size: 12px;">No</th>
                                    <th scope="col" style="font-size: 12px;">Nama Uker</th>
                                    <th scope="col" style="font-size: 12px;">Kode Uker</th>
                                    <th scope="col" style="font-size: 12px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                               @forelse ($kunjungan->kunjungan_ukers as $item)
                                    <tr>
                                        <td tyle="font-size: 12px;">{{$i++}}</td>
                                        <td style="font-size: 12px;">{{$item->nama_uker}}</td>
                                        <td style="font-size: 12px;">{{$item->kode_uker}}</td>
                                        <td style="font-size: 12px;">
                                            <a href="{{route('kunjunganuker.detail', ['id' => $item->id])}}" class="btn btn-sm btn-primary">Detail</a>
                                        </td>
                                    </tr>
                               @empty
                                    <tr>
                                        <th colspan="7" class="text-center">Belum ada data Unit Kerja</th>
                                    </tr>
                               @endforelse ()
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unitKerjaModal" tabindex="-1" aria-labelledby="unitKerjaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="unitKerjaModalLabel">Tambah Unit Kerja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="unitKerjaForm">
                    @csrf
                    <input type="hidden" name="kunjungan_cabang_id" value="{{ $kunjungan->id }}">
                    <div class="mb-3">
                        <label for="nama_uker" class="form-label">Unit Kerja</label>
                        <select name="nama_uker" id="nama_uker" class="form-control">
                            <option value="">-- Pilih Unit Kerja --</option>
                            @foreach ($ukers as $item)
                                <option value="{{$item->nama_uker}}">{{$item->nama_uker}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('add-scripts')
<script>
    $(document).ready(function() {
        $('#unitKerjaForm').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                url: "{{ route('kunjunganuker.store') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    $('#unitKerjaModal').modal('hide');
                    // Menggunakan SweetAlert untuk menampilkan pesan sukses
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Unit Kerja berhasil ditambahkan!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload(); // Reload halaman setelah pengguna menutup alert
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan: ' + xhr.responseText,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });

</script>
@endpush
