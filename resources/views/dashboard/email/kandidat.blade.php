<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <p>Terima kasih atas ketertarikan anda untuk bergabung dengan kami. kami menghargai waktu yang anda luangkan untuk melamar pada posisi <strong>{{ $details['jabatan'] }}</strong></p>

    <br>

    <p>Kami telah meninjau profil anda. kami mengundang anda untuk wawancara sehingga kita dapat berdiskusi lebih klanjut mengenai kesempatan diatas yang akan diadakan sesuai dengan jadwal sebagai berikut : </p>
    
    <br>
    
    <table style="font-weight:bold">
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td>{{ $details['tanggal'] }}</td>
        </tr>
        <tr>
            <td>Waktu</td>
            <td>:</td>
            <td>{{ $details['waktu'] }}</td>
        </tr>
        <tr>
            <td>Tempat</td>
            <td>:</td>
            <td>{{ $details['tempat'] }}</td>
        </tr>
    </table>
    
    <br>
    <br>



    <p>Kami tunggu kabar dari anda.</p>

    <br>

    <p>Hormat Kami.</p>
    <br>
    <p>SDM SMA 1 Sitiung</p>
   
    <p>Terima Kasih</p>
</body>
</html>