<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-lg-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h5 class="text-center fst-italic">Silahkan masukkan data diri</h5>
                        <form action="{{ route('visit.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') {{ 'is-invalid' }} @enderror">
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Umur</label>
                                <select name="umur" class="form-select">
                                    <option>Pilih</option>
                                    @for ($i = 1; $i <= date('Y') - 1965; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <h5 class="fst-italic text-center">Alamat Lengkap</h5>
                            <hr>
                            <div class="form-group mb-3">
                                <label for="provinsi">Provinsi</label>
                                <select name="provinsi" class="form-select" id="provinsi">
                                    <option>Pilih</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="kota">Kabupaten / Kota</label>
                                <select name="kota" class="form-select" id="kota">
                                    <option>Pilih</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="kecamatan">Kecamatan</label>
                                <select name="kecamatan" class="form-select" id="kecamatan">
                                    <option>Pilih</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="kelurahan">Kelurahan</label>
                                <select name="kelurahan" class="form-select" id="kelurahan">
                                    <option>Pilih</option>
                                </select>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-sm btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
            .then((response) => response.json())
            .then((provinces) => {
                var data = provinces;
                var tampung = `<option>Pilih</option>`;
                data.forEach((element) => {
                    tampung +=
                        `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById("provinsi").innerHTML = tampung;
            });
    </script>
    <script>
        const selectProvinsi = document.getElementById('provinsi');
        const selectKota = document.getElementById('kota');
        const selectKecamatan = document.getElementById('kecamatan');
        const selectKelurahan = document.getElementById('kelurahan');

        selectProvinsi.addEventListener('change', (e) => {
            var provinsi = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
                .then((response) => response.json())
                .then((regencies) => {
                    var data = regencies;
                    var tampung = `<option>Pilih</option>`;
                    document.getElementById('kota').innerHTML = '<option>Pilih</option>';
                    document.getElementById('kecamatan').innerHTML = '<option>Pilih</option>';
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                    data.forEach((element) => {
                        tampung +=
                            `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kota").innerHTML = tampung;
                });
        });

        selectKota.addEventListener('change', (e) => {
            var kota = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
                .then((response) => response.json())
                .then((districts) => {
                    var data = districts;
                    var tampung = `<option>Pilih</option>`;
                    document.getElementById('kecamatan').innerHTML = '<option>Pilih</option>';
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                    data.forEach((element) => {
                        tampung +=
                            `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kecamatan").innerHTML = tampung;
                });
        });
        selectKecamatan.addEventListener('change', (e) => {
            var kecamatan = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
                .then((response) => response.json())
                .then((villages) => {
                    var data = villages;
                    var tampung = `<option>Pilih</option>`;
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                    data.forEach((element) => {
                        tampung +=
                            `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kelurahan").innerHTML = tampung;
                });
        });
    </script>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
