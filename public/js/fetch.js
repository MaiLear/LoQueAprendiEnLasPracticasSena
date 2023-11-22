$fragment = new DocumentFragment();
$containerElement = document.getElementById("t-body");
$templateTable = document.getElementById("template-table").content;

fetch("https://jsonplaceholder.typicode.com/todos")
    .then((response) =>
        response.ok ? response.json() : Promise.reject(response)
    )
    .then((data) => {
        data.forEach((element) => {
            $templateTable.querySelector(".template-table-item1").textContent =
                element.userId;
            $templateTable.querySelector(".template-table-item2").textContent =
                element.id;
            $templateTable.querySelector(".template-table-item3").textContent =
                element.title;
            $templateTable.querySelector(".template-table-item4").textContent =
                element.completed;
            const clone = $templateTable.cloneNode(true);
            $fragment.appendChild(clone);
        });
        $containerElement.appendChild($fragment);
    })
    .catch((error) => {
        console.log("Este es el catch" + error);
    })
    .finally(() => {
        console.log("Esto se imprimira sin importa la respuesta");
    });

fetch("http://127.0.0.1:8001/api/products/1", {
    method: 'PUT',

    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        name : "juanpabloamigo"
    })
})
.then((response)=>{ response.ok ? response.json() : Promise.reject(response)})
.then((data)=>{
    console.log(data);
})
.catch((error)=>{
    console.log('Este es el catch:',error);
})
.finally(()=>{
    console.log('Esta es la respuesta del post');
})
