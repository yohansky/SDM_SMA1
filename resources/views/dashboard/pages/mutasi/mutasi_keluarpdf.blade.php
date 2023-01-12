

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
        <center><h4>Pemerintah Kabupaten Dharmasraya Dinas Pendidikan Dan Kebudayaan SMA Negeri 1 Sitiung</h4></center>
        <hr style="height: 10px">
        <hr>
        <center>
            <h4>
                {{ $title }}
            </h4>
        </center>
        <table style="margin : 0 auto;">
            <th>
                <td>Nik</td>
                <td>Nama</td>
                <td>Sebagai Tenaga</td>
                <td>Tanggal Masuk</td>
                <td>Keterangan</td>
            </th>
            @forelse($mutasi as $m)
            <tr>
                <td>
                  <div class="text-center">
                    <h6 class="text-sm mb-0">{{ $m->karyawan->NIK }}</h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                  
                    <h6 class="text-sm mb-0">{{ $m->Karyawan->nama }}</h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <h6 class="text-sm mb-0">{{ $m->Karyawan->getJabatan->name }}</h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <h6 class="text-sm mb-0">{{ $m->Karyawan->mulai_kerja }}</h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <h6 class="text-sm mb-0">{{ $m->keterangan }}</h6>
                  </div>
                </td>
              </tr>
            @empty
            <tr>
                
            </tr>
            @endforelse
        </table>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>