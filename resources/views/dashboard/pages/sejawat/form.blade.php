<form role="form text-left" action="{{ route("penilaian.form.post", $plotid) }}" method="post">
    @csrf
    @method("POST")
    
    <table>
      <tr>
        <td>
          <label for="">Kepada : </label>
          
        </td>
        <td>
          <input list="browsers" name="nik_dinilai" id="browser" value="{{ $nik }}" readonly>
          <datalist id="browsers">
            @foreach (getGuruExceptMe() as $item)
            <option value="{{ $item->NIK }}">
            @endforeach
          </datalist>
        </td>
      </tr>
        <tr>
            <td>
                <label for="">Kemampuan berprilaku guru sebagai panutan dan teladan</label>
            </td>
            <td>
              <select name="pilihan_1" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Kesopanan berpakaian, cara berbicara dan cara memperlakukan orang lain</label>
            </td>
            <td>
              <select name="pilihan_2" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Kemampuan menghargai pendapat orang lain</label>
            </td>
            <td>
              <select name="pilihan_3" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Kemampuan menyampaikan pendapat baik secara lisan maupun tulisan</label>
            </td>
            <td>
              <select name="pilihan_4" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Kemampuan menerima saran dan kritikan dari orang lain</label>
            </td>
            <td>
              <select name="pilihan_5" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Kemampuan bekerjasama dengan teman sejawat</label>
            </td>
            <td>
              <select name="pilihan_6" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Menaati peraturan yang berlaku di sekolah dan masyarakat</label>
            </td>
            <td>
              <select name="pilihan_7" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Hadir tepat waktu sesuai dengan jadwal kerja yang ditetapkan</label>
            </td>
            <td>
              <select name="pilihan_8" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Bertanggungjawab bila melaksanakan tugas dinas</label>
            </td>
            <td>
              <select name="pilihan_9" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Melaksanakan tugas, tanpa menunda-nunda pekerjaan tugas itu</label>
            </td>
            <td>
              <select name="pilihan_10" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Berusaha untuk mengetahui dan memperhatikan keadaan siswanya</label>
            </td>
            <td>
              <select name="pilihan_11" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Mengucapkan perkembangan yang optimal pada siswa</label>
            </td>
            <td>
              <select name="pilihan_12" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Kesediaan membimbing siswa belajar secara tulus ikhlas</label>
            </td>
            <td>
              <select name="pilihan_13" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Kemampuan dapat mengendalikan emosi/marah</label>
            </td>
            <td>
              <select name="pilihan_14" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </td>
        </tr>
    </table>
    <div class="text-center">
      <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Tambahkan Data</button>
    </div>
  </form>