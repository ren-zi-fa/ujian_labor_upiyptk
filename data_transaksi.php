<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi</title>
    <style>
        h1 {
            text-align: center;
        }
        .form_input {
            width: 500px;
            padding: 9px;
            border: 2px solid black;
            margin: 0 auto;
        }
        .tabel-data {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 6px;
            vertical-align: middle;
        }
        label {
            display: inline-block;
            width: 150px;
        }
        input {
            width: 100%;
            padding: 4px;
            box-sizing: border-box;
        }
        .tabel-trx{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 2px solid   black;
        }
        tr, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <a href="index.php">Home</a>
    <h1>Data Transaksi</h1>
    <div class="form_input">
        <form id="form_trx">
            <table class="tabel-data">
                <tr>
                    <td><label for="id_transaksi">ID Transaksi</label></td>
                    <td><input type="text" name="id_transaksi" id="id_transaksi"></td>
                </tr>
                <tr>
                    <td><label for="tgl_transaksi">Tanggal Transaksi</label></td>
                    <td><input type="date" name="tgl_transaksi" id="tgl_transaksi"></td>
                </tr>
                <tr>
                    <td><label for="kode_obat">Kode Obat</label></td>
                    <td><select name="kode_obat" id="kode_obat">
                        <option value="OBT001" >OBT001</option>
                        <option value="OBT002" >OBT002</option>
                        <option value="OBT003" >OBT003</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="nama_obat">Nama Obat</label></td>
                    <td><input type="text" name="nama_obat" id="nama_obat"></td>
                </tr>
                <tr>
                    <td><label for="stok_obat">Stok Obat</label></td>
                    <td><input type="number" name="stok_obat" id="stok_obat"></td>
                </tr>
                <tr>
                    <td><label for="harga_obat">Harga Obat</label></td>
                    <td><input type="number" name="harga_obat" id="harga_obat"></td>
                </tr>
                <tr>
                    <td><label for="jumlah_beli">Jumlah Beli</label></td>
                    <td><input type="number" name="jumlah_beli" id="jumlah_beli"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="button" id="hitung">Hitung</button></td>
                </tr>
                <tr>
                    <td><label for="total">Total</label></td>
                    <td><input type="number" name="total" id="total" step="0.01"></td>
                </tr>
                <tr>
                    <td><label for="diskon">Diskon</label></td>
                    <td><input type="number" name="diskon" id="diskon" step="0.01"></td>
                </tr>
                <tr>
                    <td><label for="total_bayar">Total Bayar</label></td>
                    <td><input type="number" name="total_bayar" id="total_bayar" step="0.01"></td>
                </tr>
            </table>
            <button type="submit">Simpan Trx</button>
        </form>
    
    </div>
   <table class="tabel-trx">
        <thead>
            <tr>
                <td>No</td>
                <td>ID Transaksi</td>
                <td>Tanggal Transaksi</td>
                <td>Kode Obat</td>
                <td>Jumlah Beli</td>
                <td>Total</td>
                <td>Diskon</td>
                <td>Total Bayar</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody id="data_transaksi">
        
        </tbody>
    </table>

    <script>
      
        const hitungBtn = document.getElementById("hitung");
        let diskon = 0;
        let stokAkhir=0;

        
        hitungBtn.addEventListener("click", () => {
            const kode_obat = document.getElementById("kode_obat").value;
            const harga_obat = document.getElementById("harga_obat").value;
            const jumlah_beli = document.getElementById("jumlah_beli").value; 
            const diskonInput = document.getElementById("diskon"); 
            const total_bayar = document.getElementById("total_bayar"); 
            const total = document.getElementById("total"); 
            const stok_obat = document.getElementById("stok_obat"); 
        if(kode_obat === "OBT001"){
            diskon =  ((10 * harga_obat) / 100) * jumlah_beli
            diskonInput.value = diskon
        } else if (kode_obat === "OBT002"){
            diskon =  ((15 * harga_obat) / 100) * jumlah_beli
            diskonInput.value = diskon
        } else if (kode_obat === "OBT003"){
              diskon =  ((20 * harga_obat) / 100) * jumlah_beli
            diskonInput.value = diskon
        }
        stokAkhir = stok_obat.value-jumlah_beli
        total.value = harga_obat*jumlah_beli;
        total_bayar.value = (harga_obat * jumlah_beli) - diskon
        }
);
  const data_transaksi = document.getElementById("data_transaksi")
    async function loadTransaksi (){
        data_transaksi.innerHTML = "";
        const resp = await fetch("/service/get_transaksi.php")
        const res = await resp.json()

        res.data.map((item, index)=>(
            data_transaksi.innerHTML += `
                <tr class="trx"  data-key=${index}>
                <td>${index + 1}</td>
                <td>${item.id_transaksi} </td>
                <td>${item.tgl_transaksi} </td>
                <td>${item.kode_obat} </td>
                <td>${item.jumlah_beli} </td>
                <td>${item.total} </td>
                <td>${item.diskon} </td>
                <td>${item.total_bayar} </td>
             <td>   <button class="btn-hapus" data-id="${item.id_transaksi}">Delete</button> </td>
                </tr>
            `
        ))
        data_transaksi.addEventListener("click", async (e) => {
            if (e.target.classList.contains("btn-hapus")) {
                const id = e.target.getAttribute("data-id");
                console.log(id)
                if (!confirm(`Yakin mau hapus transaksi ${id}?`)) return;

                try {
                    const response = await fetch("/service/delete_transaksi.php", {
                        method: "DELETE",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({ id_transaksi: id })
                    });

                    const result = await response.json();
                    if (result.success) {
                  e.target.closest(".trx").remove();
                alert("Data berhasil dihapus");
                window.location.reload();
                    } else {
                        alert("Gagal menghapus data: " + result.message);
                    }
                } catch (error) {
                    console.error("Error deleting transaction:", error);
                }
            }
        });
     }  

    loadTransaksi()

    async function simpanTrx(formData){
      try {
          const data = await fetch("/service/simpan_transaksi.php", {
            method:"POST",
            body: JSON.stringify(formData)
        })
        const resp = await data.json()
        if(resp.success){
            alert(resp.message)
            window.location.reload()
        } else {
            alert(resp.message);
        }
        
      } catch (error) {
        console.error(resp.message)
      }
    }
    const formTrx = document.getElementById("form_trx")
    formTrx.addEventListener("submit",(e)=>{
        e.preventDefault()
         const data = new FormData(formTrx)
        const dataTrx = Object.fromEntries(data)
        simpanTrx(dataTrx)
    })

    </script>
</body>
</html>
