<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        .btn-tambah{
            background-color: blue;
            padding: 5px 20px;
            color: white;
        }
        .btn-tambah:hover{
            background-color: greenyellow;
            color: burlywood;
        }
        .btn-hapus{
            background-color: red;
            padding: 5px 20px;
            color: white;
        }
        .btn-hapus:hover{
            background-color: salmon;
            color: burlywood;
        }
        .btn-ubah{
            background-color: greenyellow;
            padding: 5px 20px;
            color: black;
        }
        .btn-ubah:hover{
            background-color: salmon;
            color: burlywood;
        }
        table,thead,tr,td {
            border: 2px solid black ;
            padding: 0.5rem;
            border-collapse: collapse;
            margin: 15px auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;font-size: large;">Daftar Obat Aptoik Bersama</h1>
   <div class="" style="display: flex;justify-content: center;gap: 10px;margin-bottom: 10px;">
     <a class="btn-tambah" href="/">Home</a>
    <a class="btn-tambah" href="tambah_obat.php">Tambah</a>
   </div>
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>Kode Obat</td>
                <td>Nama Obat</td>
                <td>Jenis Obat</td>
                <td>Harga Obat</td>
                <td>Stok Obat</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody id="konten-tabel">
        
        </tbody>
    </table>
    <script>
        const konten = document.getElementById("konten-tabel");
    
        async function  loadDataObat(){
             konten.innerHTML = "";
            const response = await fetch ("/service/get_obat.php");
            const result = await response.json()
            
            result.data.map((row,index)=>(
                konten.innerHTML += `  <tr data-key=${index}>
                <td >${index+1}</td>
                <td>${row.kode_obat}</td>
                <td>${row.nama_obat}</td>
                <td>${row.jenis_obat}</td>
                <td>${row.harga_obat}</td>
                <td>${row.stok_obat}</td>
                <td>
                <button class="btn-hapus" data-id=${row.id}>Delete</button>
                <button class="btn-ubah" data-id=${row.id}>Ubah</button>
                </td>
            </tr>`    
            ))
        } 
        loadDataObat()
        konten.addEventListener("click",async (e)=>{
        if (e.target.classList.contains("btn-hapus")) {
        const id = e.target.getAttribute("data-id");

        if (!confirm(`Yakin mau hapus obat ${id}?`)) return;

        try {
            const response = await fetch("/service/delete_obat.php", {
                method: "DELETE", 
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ id: id })
            });

            const result = await response.json();

            if (result.success) {
                // Hapus baris dari tabel tanpa reload
                e.target.closest("tr").remove();
                alert("Data berhasil dihapus");
                loadDataObat();
            
            } else {
                alert("Gagal menghapus data");
            }
        } catch (err) {
            console.error(err);
            alert("Terjadi kesalahan server");
        }
    }
    if (e.target.classList.contains("btn-ubah")) {
    const id = e.target.getAttribute("data-id");
    window.location.href = `/ubah_obat.php?id=${id}`;
    }
        })
    </script>
</body>
</html>