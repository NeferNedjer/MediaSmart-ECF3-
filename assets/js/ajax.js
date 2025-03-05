let searchForm = document.getElementById('search-form');

let searchInput = document.getElementById('search');

const container = document.getElementById('response');

searchInput.addEventListener('input', function(){

    console.log(searchInput.value.length);
    
    container.innerText="";

    if (searchInput.value.length >= 1) {

            let formData = new FormData(searchForm);
            fetch('/searchAuthor', {
                method: "POST",
                body: formData
            })
            .then((datas) => datas.json())
            // .then((datas) => console.log(datas))    
            
            .then((datas) => {   

            datas.forEach(author => {

                const li = document.createElement('li'); 
                li.textContent = author.name; 
                container.appendChild(li);
            
            } )

        })

    }
});
