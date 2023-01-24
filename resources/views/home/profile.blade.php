@extends('home.master1')

@section('konten')
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
              Profil
            </h2>
        </div>
        <form action="#">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="contoh1">Nama</label>
                    <input type="text" class="form-control" value="">
                </div>
                <div class="form-group col-md-6">
                    <label for="contoh2">NIK</label>
                    <input type="number" class="form-control" value="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="contoh1">Nama Ayah</label>
                    <input type="text" class="form-control" id="contoh1" value="">
                </div>
                <div class="form-group col-md-4">
                    <label for="contoh2">Pekerjaan Ayah</label>
                    <input type="text" class="form-control" id="contoh2" value="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Status Ayah</label>
                    <select class="form-control" name="id_kategori" id="id_kategori" required>
                        <option value="" >...</option>
                        <option value="">Ayah Kandung</option>
                        <option value="">Ayah Angkat</option>
                        <option value="">Ayah Tiri</option>
                        <option value="">Ayah Asuh</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="contoh1">Nama Ibu</label>
                    <input type="text" class="form-control" id="contoh1" value="">
                </div>
                <div class="form-group col-md-4">
                    <label for="contoh2">Pekerjaan Ibu</label>
                    <input type="text" class="form-control" id="contoh2" value="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Status Ibu</label>
                    <select class="form-control" name="status" id="status" required>
                        <option value="" >...</option>
                        <option value="">Ibu Kandung</option>
                        <option value="">Ibu Angkat</option>
                        <option value="">Ibu Tiri</option>
                        <option value="">Ibu Asuh</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="">Alamat</label>
                <textarea class="form-control" name="address" id="address" cols="30" rows="10" aria-valuetext=""></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</section>
@endsection
