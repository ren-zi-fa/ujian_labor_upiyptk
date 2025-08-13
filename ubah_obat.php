<?php
$id = $_GET['id'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data Obat</title>
</head>
<body>
    <a href="data_obat.php">Kembali</a>
<h1>Ubah Data Obat</h1>
<form id="editForm">
    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
    <label>Kode Obat</label>
    <input type="text" id="kode_obat" name="kode_obat"><br>
    <label>Nama Obat</label>
    <input type="text" id="nama_obat" name="nama_obat"><br>
      <div class="" style="margin-bottom: 8px;">
    <label for="">Jenis Obat</label>
          <select name="jenis_obat" id="jenis_obat">
            <option value="obat ringan">Obat Ringan</option>
            <option value="obat sedang">Obat Sedang</option>
            <option value="obat keras">Obat Keras</option>
          </select>
      
        </div>
    <label>Harga Obat</label>
    <input type="number" id="harga_obat" name="harga_obat"><br>
    <label>Stok Obat</label>
    <input type="number" id="stok_obat" name="stok_obat"><br>
    <button type="submit">Simpan Perubahan</button>
</form>

<script>
async function loadData(id) {
try {
     const res = await fetch(`/service/get_single_obat.php?id=${id}`);
    const result = await res.json();
    if(!result.data) {
        throw new Error("Data tidak ditemukan");
    }

    document.getElementById('kode_obat').value = result.data.kode_obat;
    document.getElementById('nama_obat').value = result.data.nama_obat;
    document.getElementById('jenis_obat').value = result.data.jenis_obat;
    document.getElementById('harga_obat').value = result.data.harga_obat;
    document.getElementById('stok_obat').value = result.data.stok_obat;
} catch (error) {
    alert("Gagal memuat data: " + error.message);
    window.location.href = 'data_obat.php';
}
}
const editForm = document.getElementById('editForm');
editForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = {
        id: document.getElementById('id').value,
        kode_obat: document.getElementById('kode_obat').value,
        nama_obat: document.getElementById('nama_obat').value,
        jenis_obat: document.getElementById('jenis_obat').value,
        harga_obat: document.getElementById('harga_obat').value,
        stok_obat: document.getElementById('stok_obat').value
    };

    if (!confirm(`Yakin mau ubah data ${formData.nama_obat}?`)) return;
    const res = await fetch('/service/update_obat.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(formData)
    });
    const result = await res.json();
    alert(result.message);
    if (result.success) {
        window.location.href = 'data_obat.php'; 
    }
});

loadData(<?php echo $id; ?>);
</script>
</body>
</html>
