const authButton = document.getElementById('auth-button');

if(authButton){
    authButton.addEventListener('click', e=>{
        if(e.target.className=='btn btn-success'){
            if(confirm('Autorizirati plan nabave?')){
                const userId = e.target.getAttribute('user');
                const yearId = e.target.getAttribute('year');
                const balance = e.target.getAttribute('expense');

                fetch(`/autorized/${userId}/${yearId}/${balance}`);
            }
        }
    })
        
}

const rejectButton = document.getElementById('rej-button');

if(rejectButton){
    rejectButton.addEventListener('click', e=>{
        if(e.target.className=='btn btn-danger'){
            if(confirm('Odbiti plan nabave?')){
                const userId = e.target.getAttribute('user');
                const yearId = e.target.getAttribute('year');


                fetch(`/rejected/${userId}/${yearId}`,{
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    })
        
}

const delPlanObjectBtn = document.getElementById('plan');

if(delPlanObjectBtn){
    delPlanObjectBtn.addEventListener('click', e=>{
        if(e.target.className=='btn btn-danger'){
            if(confirm('Izbrisati stavku?')){
                const id = e.target.getAttribute('data-id');
                const userId = e.target.getAttribute('user-id');
                const yearId = e.target.getAttribute('year-id');
                

                fetch(`/deletePlanObject/${id}/${userId}/${yearId}`,{
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
        
}
