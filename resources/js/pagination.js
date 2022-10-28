
window.toPage = (p) => {

    fetch(`http://localhost:8000/api/products?page=${p}`)
        .then((response) => response.json())
        .then((data) => {
            const tableRows = document.querySelectorAll('tr.product-data')

            tableRows.forEach((row, index) => {
                const {_id, name, slug} = data[index]
                row.children[0].innerHTML = _id
                row.children[1].innerHTML = name
                row.children[2].innerHTML = slug
            })
        })
        .catch((error) => {
            alert('Ocurrió un error :c')
        })
}


