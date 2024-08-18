document.getElementById('add-sample').addEventListener('click', function() {
    const tableBody = document.getElementById('sample-table-body');
    const row = document.createElement('tr');

    row.innerHTML = `
        <td><input type="date" name="date[]"></td>
        <td><input type="text" name="sample_type[]"></td>
        <td><input type="text" name="batch[]"></td>
        <td><input type="text" name="description[]"></td>
        <td><input type="text" name="operator_name[]"></td>
        <td>Auto</td>
        <td><button class="delete">Hapus</button></td>
    `;

    tableBody.appendChild(row);
});

document.getElementById('sample-table-body').addEventListener('click', function(e) {
    if (e.target.classList.contains('delete')) {
        e.target.parentElement.parentElement.remove();
    }
});
