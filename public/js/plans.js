const searchBox = document.getElementById('search-box');
    if(searchBox){
        searchBox.addEventListener('keyup',e=>{
            let textInput=e.currentTarget.value.toUpperCase();

            let executioners = document.querySelectorAll('.executioner');

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
    function getSelectedValueByYear()
    {
        var selectedValue=document.getElementById('list-year').value;

        let tables=document.querySelectorAll('.table .year');
        for(let i=0;i<tables.length;i++)
        {
            let table=tables[i];
            table.parentElement.parentElement.parentElement.classList.remove("hidden");
            if(selectedValue!=table.innerText)
                table.parentElement.parentElement.parentElement.classList.add("hidden");
            
            else if(selectedValue==table.innerText)
                table.parentElement.parentElement.parentElement.classList.remove("hidden");

            if(selectedValue=='showAll')
                table.parentElement.parentElement.parentElement.classList.remove("hidden");

        }
    }

    function getSelectedValueByUser()
    {
        var selectedValue=document.getElementById('list-user').value;

        let tables=document.querySelectorAll('.table .executioner');
        for(let i=0;i<tables.length;i++)
        {
            let table=tables[i];
            table.parentElement.parentElement.parentElement.classList.remove("hidden");
            if(selectedValue!=table.innerText)
                table.parentElement.parentElement.classList.add("hidden");
            
            else if(selectedValue==table.innerText)
                table.parentElement.parentElement.classList.remove("hidden");

            if(selectedValue=='showAll')
                table.parentElement.parentElement.classList.remove("hidden");

        }
    }
    