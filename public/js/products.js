
const cpvs = document.getElementById('cpvs');

if(cpvs){
    cpvs.addEventListener('click', e=>{
        if(e.target.className=='btn btn-danger delete-article'){
           if(confirm('Želite li obrisati predmet nabave?')){
                const id = e.target.getAttribute('data-id');

                fetch(`/products/deleteCpv/${id}`,{
                    method: 'DELETE'
                }).then(res => window.location.reload());
           }
        }
    });

}


const searchBox = document.getElementById('search-box');
if(searchBox){
    searchBox.addEventListener('keyup',e=>{
        let textInput=e.currentTarget.value.toUpperCase();

        let executioners = document.querySelectorAll('.description');
        

        for(let i=0; i<executioners.length; i++)
        {  
            let executioner=executioners[i];
            let textContentExecutioner=executioner.textContent.toUpperCase();

            if(textContentExecutioner.indexOf(textInput) >= 0)
                executioner.parentElement.parentElement.classList.remove("hidden");

            else if(textContentExecutioner.indexOf(textInput)<0)
                executioner.parentElement.parentElement.classList.add("hidden");
                
        }
    })
}