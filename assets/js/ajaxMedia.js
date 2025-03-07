let searchFormMedia = document.getElementById("search_formMedia");
let searchInputMedia = document.getElementById("searchMedia");
let responseMedia = document.getElementById("responseMedia");

searchInputMedia.addEventListener('input', function(){
    responseMedia.innerText = "";
    if(searchInputMedia.value.length >= 1) {
       let formDataMedia = new FormData(searchFormMedia);
        fetch('/searchMedia', {
            method: 'POST',
            body: formDataMedia,
        })
        .then((datas) => datas.json())
        .then((datas) => {
            console.log(datas);
            const ulDatas = document.createElement("ul");
            for (const data of datas){
                const liData = document.createElement("li");
                liData.innerText = data.title;
                ulDatas.append(liData);
            }
            responseMedia.append(ulDatas);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
});