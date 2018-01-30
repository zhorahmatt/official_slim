<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
    <form>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Peserta">
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
        </div>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="jenkel" id="jenkel1" value="1" checked>
                    Laki-laki
                </label>
                </div>
                <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="jenkel" id="jenkel2" value="2">
                    Perempuan
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="textarea" class="form-control">
        </div>
        <div class="form-control">
            <label for="nohp">Nomor Handphone</label>
            <input type="text" name="nohp" id="nohp">
        </div>
        <div class="form-control">
            <label for="komunitas">komunitas</label>
            <input type="text" name="komunitas" id="komunitas">
        </div>
        <div>
            <label for="individu">Individu</label>
            <input type="text" name="individu" id="individu">
        </div>
        <div>
            <label for="baju">Ukuran Baju</label>
            <input type="text" name="baju" id="baju">
        </div>
        <div>
            <label for="goldar">Golongan Darah</label>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="jenkel" id="jenkel1" value="1" checked>
                        Laki-laki
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="jenkel" id="jenkel2" value="2">
                        Perempuan
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="jenkel" id="jenkel2" value="2">
                        Perempuan
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="jenkel" id="jenkel2" value="2">
                        Perempuan
                    </label>
                </div>
            </div>
        </div>
        <div>
            <label for="penyakit">Penyakit yang pernah di derita</label>
            <select name="penyakit" id="penyakit">
                <option value="a">Penyakit A</option>
                <option value="a">Penyakit A</option>
                <option value="a">Penyakit A</option>
                <option value="a">Penyakit A</option>
                <option value="a">Penyakit A</option>
                <option value="a">Penyakit A</option>
                <option value="a">Penyakit A</option>
            </select>
        </div>
        <div>
            <label for="hpkeluarga">No. Handphone Keluarga</label>
            <input type="text" name="hpkeluarga" id="">
        </div>
        <div>
            <label for="hubkeluarga">Hubungan dengan Kelurarga</label>
            <input type="text" name="hubkeluarga" id="">
        </div>
    </form>
</body>
</html>