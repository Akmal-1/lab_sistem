document.addEventListener("DOMContentLoaded", function() {
    // Mengambil elemen-elemen dari DOM berdasarkan ID atau selector
    const addSampleBtn = document.getElementById("add-sample");
    const sampleTableBody = document.getElementById("sample-table-body");
    const sampleTable = document.querySelector("table");
    const tableHeader = document.querySelector("thead");
    const sendRequestBtn = document.getElementById("send-request");

    // Pastikan semua elemen ditemukan sebelum melanjutkan
    if (!addSampleBtn || !sampleTableBody || !sampleTable || !tableHeader || !sendRequestBtn) {
        console.error("Satu atau lebih elemen tidak ditemukan di dalam DOM.");
        return; // Keluar dari fungsi jika elemen tidak ditemukan
    }

    // Sembunyikan header tabel dan tombol "Send Request" di awal
    tableHeader.style.display = "none";
    sendRequestBtn.style.display = "none";

    // Mapping kategori sampel ke tipe sampel
    const tipeSampelOptions = {
        "Raw Material": ["Raw Material 1", "Raw Material 2"],
        "SnCl plant": ["SnCl 1", "SnCl 2"],
        "Intermediate plant": ["DMT Line 1", "DMT Line 2", "DMT Mixing"],
        "Methyltin stabilizer plant": ["MTS Reaksi akhir", "MTS Settle"],
        "Tin Solder plant": ["Tin Solder 1", "Tin Solder 2"],
        "Other": ["Other 1", "Other 2"],
    };

    // Event listener untuk menambahkan baris baru
    addSampleBtn.addEventListener("click", function() {
        // Tampilkan header tabel dan tombol "Send Request" ketika menambahkan sampel pertama kali
        if (sampleTableBody.children.length === 0) {
            tableHeader.style.display = "";
            sendRequestBtn.style.display = "inline-block";
        }

        // Membuat baris baru dalam tabel
        const newRow = document.createElement("tr");

        // Membuat dropdown untuk kategori sampel berdasarkan tipe sampel yang tersedia
        const kategoriSampelOptionsHtml = Object.keys(tipeSampelOptions)
            .map(option => `<option value="${option}">${option}</option>`)
            .join("");

        // Menambahkan HTML untuk baris baru ke dalam tabel
        newRow.innerHTML = `
            <td>
                <input type="date" name="date[]" class="form-control" placeholder="Pilih Tanggal" required>
            </td>
            <td>
                <select name="kategori_sampel[]" class="form-control kategori-sampel-select" required>
                    <option value="" disabled selected>Pilih Kategori Sampel</option>
                    ${kategoriSampelOptionsHtml}
                </select>
            </td>
            <td>
                <select name="tipe_sampel[]" class="form-control tipe-sampel-select" required>
                    <option value="" disabled selected>Pilih Tipe Sampel</option>
                </select>
            </td>
            <td><input type="text" name="batch_lot[]" class="form-control" placeholder="Masukkan Batch/Lot"></td>
            <td><input type="text" name="deskripsi[]" class="form-control" placeholder="Masukkan Deskripsi"></td>
            <td><input type="text" name="pemohon[]" class="form-control" placeholder="Masukkan nama" required></td>
            <td class="button-action">
                <button type="button" class="btn btn-warning edit"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-success save"><i class="fas fa-save"></i></button>
                <button type="button" class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
            </td>
        `;

        // Menambahkan baris baru ke dalam tbody tabel
        sampleTableBody.appendChild(newRow);

        // Event listener untuk mengupdate dropdown tipe sampel berdasarkan kategori yang dipilih
        newRow.querySelector('.kategori-sampel-select').addEventListener('change', function(event) {
            const selectedKategori = event.target.value;
            const tipeSampelSelect = newRow.querySelector('.tipe-sampel-select');

            // Membuat opsi untuk tipe sampel yang sesuai dengan kategori yang dipilih
            const tipeSampelOptionsHtml = tipeSampelOptions[selectedKategori]
                .map(option => `<option value="${option}">${option}</option>`)
                .join("");

            // Mengisi dropdown tipe sampel dengan opsi yang sesuai
            tipeSampelSelect.innerHTML = `<option value="" disabled selected>Pilih Tipe Sampel</option>${tipeSampelOptionsHtml}`;
        });
    });

    // Event listener untuk menghapus baris
    sampleTableBody.addEventListener("click", function(event) {
        if (event.target.classList.contains("delete") || event.target.closest(".delete")) {
            const row = event.target.closest("tr");
            sampleTableBody.removeChild(row);

            // Sembunyikan header tabel dan tombol "Send Request" jika tidak ada baris yang tersisa
            if (sampleTableBody.children.length === 0) {
                tableHeader.style.display = "none";
                sendRequestBtn.style.display = "none";
            }
        }
    });
});
