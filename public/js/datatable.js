window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('dataTable');
    if (datatablesSimple) {
        const dataTable = new simpleDatatables.DataTable(datatablesSimple, {
            perPage: 10,
            perPageSelect: [5, 10, 20, 50],
            columns: [
                { select: 0, sort: "asc" }
            ],
            searchable: true,
            fixedHeight: true,
            plugins: {
                export: {
                    csv: true,
                    xlsx: true,
                    pdf: true
                }
            }
        });

    }
});


