document.addEventListener('DOMContentLoaded', function () {
    const addSampleButton = document.getElementById('add-sample');
    const sampleTableBody = document.getElementById('sample-table-body');

    addSampleButton.addEventListener('click', function () {
        const newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td><input type="text" name="date[]" placeholder="dd/mm/yyyy"></td>
            <td>
                <select name="tipe_sampel[]">
                    <option value="DMT Line 1">DMT Line 1</option>
                    <option value="DMT Line 2">DMT Line 2</option>
                    <option value="DMT Line 3">DMT Line 3</option>
                </select>
            </td>
            <td><input type="text" name="batch_lot[]"></td>
            <td><input type="text" name="deskripsi[]"></td>
            <td><input type="text" name="nama[]" placeholder="Auto" readonly></td>
            <td>
                <button class="delete"><i class="fas fa-trash"></i></button>
            </td>
        `;

        sampleTableBody.appendChild(newRow);

        // Menambahkan event listener ke tombol delete
        newRow.querySelector('.delete').addEventListener('click', function () {
            newRow.remove();
        });
    });
});
