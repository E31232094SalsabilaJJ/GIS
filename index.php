<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <title>Leaflet</title>
  
<body>
  
  <div class="container-fluid">
    <div class="container">
      <div class="vh-100">
        <div id="map" class="vh-100"></div>
      </div>

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#tambahData">
        Tambah Data
      </button>

      <!-- Modal Tambah -->
      <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="nama">Nama Lokasi</label>
                <input type="text" name="nama" id="nama" class="form-control">
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi" class="form-control">
              </div>
              <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control">
              </div>
              <div class="form-group">
                <label for="mapInput">Lokasi</label>
                <div id="mapInput" style="min-height: 200px; min-width: 300px"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
              <button type="button" onclick="tambahData()" data-bs-dismiss="modal" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>

     <!-- Form Pencarian -->
      <form action="/search" method="get">
        <input type="text" id="search" name="query" placeholder="Ketik pencarian">
        <button type="submit">Cari</button>
      </form>

      <!-- Model Edit -->
      <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="namaEdit">Nama Lokasi</label>
                <input type="text" name="namaEdit" id="namaEdit" class="form-control">
              </div>
              <div class="form-group">
                <label for="deskripsiEdit">Deskripsi</label>
                <input type="text" name="deskripsiEdit" id="deskripsiEdit" class="form-control">
              </div>
              <div class="form-group">
                <label for="gambarEdit">Gambar</label>
                <input type="file" name="gambarEdit" id="gambarEdit" class="form-control">
              </div>
              <div class="form-group">
                <label for="mapInputEdit">Lokasi</label>
                <div id="mapInputEdit" style="min-height: 200px; min-width: 300px"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
              <button type="button" onclick="editDataSimpan()" data-bs-dismiss="modal" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Model Edit -->
      <div class="modal fade" id="hapusData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah anda yakin akan menghapus data ini?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
              <button type="button" onclick="hapusData()" data-bs-dismiss="modal" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>

      <table class="table mt-4">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Lokasi</th>
            <th>Deskripsi</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Gambar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
      </table>
    </div>
  </div>

  <script>
    var map = L.map('map').setView([-8.170711887995996, 473.697509765625], 13);
    var mapInput = L.map('mapInput').setView([-8.170711887995996, 473.697509765625], 13);
    var mapInputEdit = L.map('mapInputEdit').setView([-8.170711887995996, 473.697509765625], 13);

    var idEdit;
    var idHapus;

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(mapInput);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(mapInputEdit);

    var marker;
    function onClickMap(e) {
      if(marker == null) {
        marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(mapInput);
      } else {
        marker.remove();
        marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(mapInput);
      }
    }

    var markerEdit;
    function onClickMapEdit(e) {
      if(markerEdit == null) {
        markerEdit = L.marker([e.latlng.lat, e.latlng.lng]).addTo(mapInputEdit);
      } else {
        markerEdit.remove();
        markerEdit = L.marker([e.latlng.lat, e.latlng.lng]).addTo(mapInputEdit);
      }
    }

    function ambilData() {
      let xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText)
          let table = document.getElementById('tbody');
          table.innerHTML = "";
          for(var i = 0; i < data.length; i++) {
            var popup = L.popup()
            .setLatLng([data[i].lat, data[i].lng])
            .setContent('<h6>' + data[i].nama_lokasi + '</h6><p class="m-0">' + data[i].deskripsi + '</p>');
            L.marker([data[i].lat, data[i].lng]).addTo(map).bindPopup(popup).openPopup();
            table.innerHTML += `
              <tr>
                <td>${i + 1}</td>
                <td>${data[i].nama_lokasi}</td>
                <td>${data[i].deskripsi}</td>
                <td>${data[i].lat}</td>
                <td>${data[i].lng}</td>
                <td>${data[i].gambar}</td>
                <td>
                  <button type="button" onclick="editData(${data[i].id})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editData">Edit Data</button>
                  <button type="button" onclick="setHapusData(${data[i].id})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusData">Hapus Data</button>
                </td>
              </tr>
              `
          }
        }
      };

      xhttp.open('GET', 'ambildata.php', true);
      xhttp.send();
    }

    function tambahData() {
      let xhttp = new XMLHttpRequest();

      let nama = document.getElementById('nama').value;
      let deskripsi = document.getElementById('deskripsi').value;
      let gambar = document.getElementById('gambar');
      let lat = marker._latlng.lat;
      let lng = marker._latlng.lng;

      gambar = gambar.value.split('\\')[2];

      xhttp.open('GET', 'tambahdata.php?nama=' + nama + '&deskripsi=' + deskripsi + '&gambar=' + gambar + '&lat=' + lat + '&lng=' + lng, true);
      xhttp.send();
    }

    function editData(id) {
      let xhttp = new XMLHttpRequest();
      idEdit = id;

      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          let jsonData = JSON.parse(this.responseText);
          let nama = document.getElementById('namaEdit');
          let deskripsi = document.getElementById('deskripsiEdit');
          let gambar = document.getElementById('gambarEdit');

          nama.value = jsonData.nama_lokasi;
          deskripsi.value = jsonData.deskripsi;
          onClickMapEdit({latlng: {lat: jsonData.lat, lng: jsonData.lng}});
        }
      };

      xhttp.open('GET', 'editdata.php?id=' + id, true);
      xhttp.send();
    }

    function editDataSimpan() {
      let xhttp = new XMLHttpRequest();

      let nama = document.getElementById('namaEdit').value;
      let deskripsi = document.getElementById('deskripsiEdit').value;
      let gambar = document.getElementById('gambarEdit');
      let lat = markerEdit._latlng.lat;
      let lng = markerEdit._latlng.lng;

      gambar = gambar.value.split('\\')[2];

      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          console.log(this.responseText);
          ambilData();
        }
      };

      xhttp.open('GET', 'editdatasimpan.php?id=' + idEdit + '&nama=' + nama + '&deskripsi=' + deskripsi + '&gambar=' + gambar + '&lat=' + lat + '&lng=' + lng, true);
      xhttp.send();
    }

    function hapusData() {
      let xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          ambilData();
        }
      };
      
      xhttp.open('GET', 'hapusdata.php?id=' + idHapus, true);
      xhttp.send();
    }

    function setHapusData(id) {
      idHapus = id;
    }

    mapInput.on('click', onClickMap);
    mapInputEdit.on('click', onClickMapEdit);
    ambilData();
  </script>
</body>
</html>