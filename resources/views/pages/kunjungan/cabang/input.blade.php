@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="page-inner">
      <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Input Kunjungan</h3>
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
                <a href="#">Input Kunjungan</a>
              </li>
            </ul>
          </div>
      </div>
      <div class="card">
        <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <form action="{{route('kunjungancabang.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_cabang">Cabang</label>
                        <select id="cabangSelect" name="nama_cabang" class="form-control">
                            <option value="">-- Pilih Cabang --</option>
                            @foreach ($cabangs as $item)
                                <option value="{{$item->nama_cabang}}">{{$item->nama_cabang}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pic">PIC</label>
                        <div class="d-flex align-items-center">
                            <select name="pic[]" id="pic" class="form-control w-75">
                                <option value="">-- Pilih PIC --</option>
                                <option value="Septian">Septian</option>
                                <option value="Catur">Catur</option>
                                <option value="Doni">Doni</option>
                                <option value="Ragil">Ragil</option>
                                <option value="Denal">Denal</option>
                                <option value="Eka">Eka</option>
                                <option value="Rizky">Rizky</option>
                                <option value="Nova">Nova</option>
                            </select>
                            <button type="button" class="btn btn-sm btn-success mx-2" onclick="addPicSelect()">+</button>
                        </div>
                    </div>
                    <div id="picContainer"></div>
                    <div class="form-group">
                        <label for="">Waktu Kunjungan</label>
                        <input type="date" name="waktu_kunjungan" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
    </div>
    </div>
</div>
@endsection
@push('add-scripts')
    <script>
        $(document).ready(function() {
            $('#cabangSelect').select2({
                placeholder: "--Pilih Cabang--",
                allowClear: true
            });
            $('#pic').select2({
                placeholder: "--Pilih PIC--",
                allowClear: true
            });
        });

        function addPicSelect() {
            // Buat div container untuk elemen select dan tombol hapus
            const newSelectContainer = document.createElement('div');
            newSelectContainer.classList.add('d-flex', 'align-items-center', 'mt-2', 'form-group');

            // Buat elemen select baru
            const newSelect = document.createElement('select');
            newSelect.name = 'pic[]';
            newSelect.classList.add('form-control', 'w-75');
            newSelect.innerHTML = `
                <option value="">-- Pilih PIC --</option>
                <option value="Septian">Septian</option>
                <option value="Catur">Catur</option>
                <option value="Doni">Doni</option>
                <option value="Ragil">Ragil</option>
                <option value="Denal">Denal</option>
                <option value="Eka">Eka</option>
                <option value="Rizky">Rizky</option>
                <option value="Nova">Nova</option>
            `;

            // Tambahkan elemen select ke dalam container baru
            newSelectContainer.appendChild(newSelect);

            // Tambahkan tombol hapus
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.classList.add('btn', 'btn-sm', 'btn-danger', 'mx-2');
            removeButton.innerHTML = '<i class="fas fa-trash-alt"></i>'; // Tambahkan ikon trash dari Font Awesome
            removeButton.onclick = function() {
                newSelectContainer.remove();
            };
            newSelectContainer.appendChild(removeButton);

            // Tambahkan container baru ke dalam picContainer
            document.getElementById('picContainer').appendChild(newSelectContainer);

            // Inisialisasi Select2 pada elemen baru jika diperlukan
            $(newSelect).select2({
                placeholder: "-- Pilih PIC --",
                allowClear: true
            });
        }
    </script>
@endpush
