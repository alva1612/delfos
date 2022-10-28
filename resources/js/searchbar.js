//Cortesía de https://levelup.gitconnected.com/debounce-in-javascript-improve-your-applications-performance-5b01855e086
const debounce = (func, wait) => {
    let timeout;

    // This is the function that is returned and will be executed many times
    // We spread (...args) to capture any number of parameters we want to pass
    return function executedFunction(...args) {

      // The callback function to be executed after
      // the debounce time has elapsed
      const later = () => {
        // null timeout to indicate the debounce ended
        timeout = null;

        // Execute the callback
        func(...args);
      };
      // This will reset the waiting every function execution.
      // This is the step that prevents the function from
      // being executed because it will never reach the
      // inside of the previous setTimeout
      clearTimeout(timeout);

      // Restart the debounce waiting period.
      // setTimeout returns a truthy value (it differs in web vs Node)
      timeout = setTimeout(later, wait);
    };
  };


window.searchbar = debounce((event) => {
    document.querySelector('table').classList.add('transition')
    setTimeout(() => {
        document.querySelector('table').classList.remove('transition')
    }, 500)
    const displayRows = document.querySelectorAll('tr.product-data')
    document.getElementById('size').innerHTML = 20


    const target = event.target
    const value = target.value.trim()
    console.log(value.length )
    if (value.length < 4) {
        displayRows.forEach(row => {
            row.classList.remove('display')
        })
    }


    console.log(value)
    fetch(`http://localhost:8000/api/search?value=${value}`)
    .then((response) => {
        console.log(response)
        if (!response.body) {
            return
        }
        return response.json();
    })
    .then((data) => {
        console.log(data)
        if (data.length > 5) {
            localStorage.setItem("searchedProducts", JSON.stringify(data))
        }

        if(data.length >= 1) {
            displayRows.forEach(row => {
                row.classList.remove('display')
            })
            document.getElementById('size').innerHTML = data.length
            const tableRows = document.querySelectorAll('tr.product-data')

            data.forEach((product, index) => {
                const {_id, name, slug} = product
                const row = tableRows[index]
                row.classList.add('display');
                row.children[0].innerHTML = _id
                row.children[1].innerHTML = name
                row.children[2].innerHTML = slug
            })
        }

    })
    .catch((error) => {
        alert('Ocurrió un error :c')
        console.log(error)
    })


}, 1000)


