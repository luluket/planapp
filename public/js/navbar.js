const signOutButton = document.getElementById('sign_out');

if(signOutButton){
    signOutButton.addEventListener('click',e=>{
        if(confirm('Odjavljujete se')){
            fetch(`/logout`).then(res=>window.location.reload());
        }
        
    });
}
