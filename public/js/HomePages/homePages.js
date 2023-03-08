console.log('Hola desde js')

const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

    document.getElementById('categories').addEventListener('change',(e)=>{
       
        fetch('products',{
            method : 'POST',
            body: JSON.stringify({categories_id : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
            return response.json()
        }).then( data =>{
            let opciones ="<option value=''>Elegir</option>"
            let stockContainer = ""
            let trs = ""
            let contador = 1
            let stock = 0
            for (let i in data.products) {
               stock += data.products[i].stock
               opciones+= '<option value="'+data.products[i].id+'">'+data.products[i].name+'</option>'
               stockContainer =  `
                        <label for="">Stock</label>
                        <span class="badge text-bg-info">${stock}</span>
                        `
               trs += `<tr>
                        <th scope="row">${contador}</th>
                        <td colspan="2">${data.products[i].name}</td>
                        <td>${data.products[i].stock}</td>
                       </tr>` 
            contador++
            }
            document.querySelector("#TblProducts tbody").innerHTML = trs
            document.getElementById('stock').innerHTML = stockContainer
            document.getElementById("products").innerHTML = opciones;
            
        }).catch(error =>console.error(error));
    })

    // DataTables





    
