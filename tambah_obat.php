<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
#form-tambah {
    margin: 0 auto;
    width: max-content;
}
</style>
<body>
    <h1 style="text-align: center;">Form Tambah Obat</h1>
    <form id="form-tambah">
        <div class="" style="margin-bottom: 8px;">
            <label for="kode_obat">kode obat</label>
            <input type="text" name="kode_obat">
        </div>
        <div class="" style="margin-bottom: 8px;">
            <label for="kode_obat">nama obat</label>
            <input type="text" name="nama_obat">
        </div>
        <div class="" style="margin-bottom: 8px;">
            <label for="">Jenis Obat</label>
          <select name="jenis_obat" id="">
            <option value="obat ringan">Obat Ringan</option>
            <option value="obat sedang">Obat Sedang</option>
            <option value="obat keras">Obat Keras</option>
          </select>
      
        </div>
        <div class="" style="margin-bottom: 8px;">
            <label for="kode_obat">harga obat</label>
            <input type="number" name="harga_obat">
        </div>
        <div class="" style="margin-bottom: 8px;">
            <label for="kode_obat">stok obat</label>
            <input type="number" name="stok_obat">
        </div>
        <button style="padding: 4px 20px;" type="submit">
            Tambah
        </button>
    </form>
    <script>
        const form = document.getElementById("form-tambah");
        async function saveData(dataObat) {
        try {
             const data = await fetch("/service/save_obat.php",{
                method:"POST",
                headers:{
                    "Content-Type":"application/json"
                },
                body: JSON.stringify(dataObat)
            })
            const response = await data.json();
            if (response.success) {
                alert(response.message);
                window.location.href = "data_obat.php";
            } else {
                alert("Gagal menambahkan data: " + response.message);
             throw new Error(response.message);
            }
    
        } catch (error) {
            console.error("Error saving data:", error);
        }
        }
        form.addEventListener("submit", (e)=>{
            e.preventDefault()
            const data = new FormData(form)
            const dataObat = Object.fromEntries(data)
            saveData(dataObat)
            
        })
    </script>
</body>

</html>