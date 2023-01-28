@extends('home.master1')

@section('konten')
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
              Profil
            </h2>
            @if ($message = Session::get('error'))
        <div class="alert alert-warning">
            <p>{{ $message }}</p>
        </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        </div>
        <form action="{{ route('up_profil', Auth::id()) }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="contoh1">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" required>
                </div>
                <div class="form-group col-md-4">
                    @if (empty(Auth::user()->nik))
                    <label for="contoh2">NIK</label>
                    <input type="number" class="form-control" name="nik" placeholder="Masukkan NIK" required>
                    @else
                    <label for="contoh2">NIK</label>
                    <input type="number" class="form-control" name="nik" value="{{ auth()->user()->nik }}" required>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    @if (empty(Auth::user()->pekerjaan))
                    <label for="contoh1">Pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaan" placeholder="Masukkan Pekerjaan" required>
                    @else
                    <label for="contoh1">Pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaan" value="{{ auth()->user()->pekerjaan }}" required>
                    @endif
                </div>
            </div>

            <div class="form-row">
                @if (empty(Auth::user()->ayah))
                <div class="form-group col-md-6">
                    <label for="contoh1">Nama Ayah</label>
                    <input type="text" class="form-control" name="ayah" placeholder="Masukkan Nama Ayah" required>
                </div>
                @else
                <div class="form-group col-md-6">
                    <label for="contoh1">Nama Ayah</label>
                    <input type="text" class="form-control" name="ayah" value="{{ auth()->user()->ayah }}" required>
                </div>
                @endif
                @if (empty(Auth::user()->a_pekerjaan))
                <div class="form-group col-md-6">
                    <label for="contoh2">Pekerjaan Ayah</label>
                    <input type="text" class="form-control" name="a_pekerjaan" placeholder="Masukkan Pekerjaan Ayah" required>
                </div>
                @else
                <div class="form-group col-md-6">
                    <label for="contoh2">Pekerjaan Ayah</label>
                    <input type="text" class="form-control" name="a_pekerjaan" value="{{ auth()->user()->a_pekerjaan }}" required>
                </div>
                @endif
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    @if (empty(Auth::user()->ibu))
                    <label for="contoh1">Nama Ibu</label>
                    <input type="text" class="form-control" name="ibu" placeholder="Masukkan Nama Ibu" required>
                    @else
                    <label for="contoh1">Nama Ibu</label>
                    <input type="text" class="form-control" name="ibu" value="{{ auth()->user()->ibu }}" required>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    @if (empty(Auth::user()->i_pekerjaan))
                    <label for="contoh2">Pekerjaan Ibu</label>
                    <input type="text" class="form-control" name="i_pekerjaan" placeholder="Masukkan Pekerjaan Ibu" required>
                    @else
                    <label for="contoh2">Pekerjaan Ibu</label>
                    <input type="text" class="form-control" name="i_pekerjaan" value="{{ auth()->user()->i_pekerjaan }}" required>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="">Alamat</label>
                @if (empty(Auth::user()->address))
                <textarea class="form-control" name="address" id="address" cols="30" rows="10" required></textarea>
                @else
                <textarea class="form-control" name="address" id="address" cols="30" rows="10" required>{{ auth()->user()->address }}</textarea>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</section>
@endsection
