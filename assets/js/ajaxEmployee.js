let searchFormEmployee = document.getElementById("search_formEmployee");
let searchInputEmployee = document.getElementById("searchEmployee");
let responseEmployee = document.getElementById("responseEmployee");

searchInputEmployee.addEventListener('input', function(){
    responseEmployee.innerText = "";
    
    if(searchInputEmployee.value.length >= 1) {
       let formDataEmployee = new FormData(searchFormEmployee);
       console.log(formDataEmployee);
        fetch('/searchEmployee', {
            method: 'POST',
            body: formDataEmployee,

        })
        .then((datas) => datas.json())
        .then((datas) => {
            console.log(datas);
            const ulDatas = document.createElement("ul");
            for (const data of datas){
                const liData = document.createElement("li");
                liData.innerText = data.name;
                ulDatas.append(liData);
            }
            responseEmployee.append(ulDatas);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
});