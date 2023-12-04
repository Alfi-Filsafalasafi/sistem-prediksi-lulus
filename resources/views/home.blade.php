<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Sistem Prediksi Kelulusan</title>
    <style>
        body {
            background-image: url('{{ asset("image/bg.jpg") }}'); /* Replace "your-image.jpg" with your actual image file */
            background-size: cover;
            background-position: center;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('image/um.webp')}}" width="48" height="48" alt="">
            </a>
        </div>
    </nav>
    <section>
        <div class="container text-center py-5 mt-4 text-white">
            <h1 class="color-1">Sistem Prediksi Kelulusan Akademik Siswa</h1>
            <h3 class="color-2">Proyek Akhir Big Data</h3>
            <h5 class="color-3">Melihat Tingkat Akurasi Data Yang Tersedia</h5>
            <form action="{{ route('process') }}" method="post" enctype="multipart/form-data" class="mt-5">
            @csrf
            <p>Silahkan masukan dataset yang akan di proses</p> <br>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <input type="file" name="dataset" class="form-control p-1" id="" placeholder="Masukkan kata kunci">
                    </div>
                    <div class="form-group col-md-3">
                        <select id="inputState" name="kriteria" class="form-control">
                            <option value="naive_bayes" selected>Naive Bayes</option>
                            <option value="decision_tree">Desicion Tree</option>
                            <option value="regression">Regresion Linier</option>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <button type="submit" class="btn btn-success">Proses</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>