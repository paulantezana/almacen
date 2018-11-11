// Metod type
// Establece los headers de las peticiones
function setHeaders(options) {
    if (options.method === 'POST' || options.method === 'PUT' || options.method === 'DELETE') {
        if (!(options.body instanceof FormData)) {
            options.headers = {
                Accept: 'application/json',
                'Content-Type': 'application/json; charset=utf-8',
                ...options.headers,
            };
            options.body = JSON.stringify(options.body);
        } else {
            // newOptions.body is FormData
            options.headers = {
                Accept: 'application/json',
                ...options.headers,
            };
        }
    }
    return options;
}

// customFetch con mas opciones
function customFetch (path, options){
    const newOptions = setHeaders(options);
    NProgress.start();
    return fetch(path, newOptions)
        .then(response => {
            NProgress.done();
            return response.json(); // Return response
        })
        .catch(e => {
            NProgress.done();
            return e; // Check catch
        });
};

// ====================================================
// pagination
function createItem(textContent, callback, active = false, disable = false){
    // Creando los elementos de navegacion
    let item = document.createElement('li');
    let link = document.createElement('a');

    // Agregando clases
    item.classList.add('page-item');
    link.classList.add('page-link');
    if(active ===  true){
        item.classList.add('active');
    }
    if(disable === true){
        item.classList.add('disabled');
    }
    
    // Agregando atributos al link
    link.textContent = textContent;
    link.setAttribute('href','#');

    // evento click
    link.addEventListener('click',(e)=>{
        e.preventDefault();
        callback(e);
    });

    // retornando el item con el link anidado
    item.appendChild(link);
    return item;
}

function pagination(total, callback, limit = 10, current = 1){
    let container = document.getElementById('pagination');
    if(!container) {
        console.warn('El id pagination no se encontro en el DOM');
        callback(1);
        return;
    }
    let pages = Math.ceil(total / limit);
    container.innerHTML = `<div>Mostrando <b>${limit}</b> de <b>${total}</b> registros</div>`;

    // create pagination
    let paginationList = document.createElement('ul');
    paginationList.classList.add('pagination');
    container.appendChild(paginationList);

    // calculate prev and next key
    let keyPrevItem = current <= 1 ? 1 : current - 1;
    let keyNextItem = current == pages ? pages : current + 1;

    // create prev element
    let prevItem = createItem('Anterior', () => callback(keyPrevItem), false, current === 1);
    paginationList.appendChild(prevItem);

    // create page numbers
    for (let i = 1; i <= pages; i++) {
        let item = createItem(i, () => callback(i), i === current);
        paginationList.appendChild(item);
    }

    // create next page
    let nextItem = createItem('Siguiente',() => callback(keyNextItem), false, current === pages);
    paginationList.appendChild(nextItem);
}