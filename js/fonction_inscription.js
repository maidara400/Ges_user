function inscription(){
    let form_inscription = document.getElementById('form_inscription')
    let valide = false


    //input du formulaire
    let nom_f = document.getElementById('nom')
    let mail_f = document.getElementById('mail')
    let password_f = document.getElementById('password')

    // valeur des input du formulaire
     let nom = document.getElementById('nom').value
     let mail = document.getElementById('mail').value
     let password = document.getElementById('password').value

    // resize de la taille des span error
    let nom_error = document.getElementById('nom_error')
        nom_error.style.fontSize = '12px'
        
    let mail_error = document.getElementById('mail_error')
        mail_error.style.fontSize = '12px'

    let password_error = document.getElementById('password_error')
        password_error.style.fontSize = '12px'
    
    // initialisation des message d erreur
    nom_error.textContent = ''
    mail_error.textContent = ''
    password_error.textContent = ''

    // evenement lier au champ  nom du formulaire
    
    nom_f.addEventListener('blur',()=>{
         nom = document.getElementById('nom').value
             // verification du champ nom
         if(typeof nom !== 'string' || nom.length < 4){
             nom_error.style.color = 'red'
             nom_error.textContent = 'Le  champs nom vide ou incorrect !'
             valide = false
         }else if (typeof nom == 'string' || nom.length > 4){
            nom_error.style.color = 'green';
            nom_error.textContent = 'Nom acceptable!';
            setTimeout(function() {
                nom_error.style.display = 'none';  // Afficher l'élément si nécessaire
            }, 2000);
            valide = true;
        }
     })



   // evenement lier au champ  mail du formulaire
   mail_f.addEventListener('blur',()=>{
    // verification du champ mail
    mail = document.getElementById('mail').value
    let regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
   if(!regex.test(mail)){
       mail_error.style.color = 'red'
       mail_error.textContent = 'L\'email est Incorrect !'
       valide = false
   }
   else if(regex.test(mail)){
       mail_error.style.color = 'green'
       mail_error.textContent = 'Email valide!'
       setTimeout(function() {
           mail_error.style.display = 'none'  // Masquer l'élément
       }, 2000);
       valide = true
   
}
})


// evenement lier au champ password du formulaire
password_f.addEventListener('blur',()=>{
            // Verification du champ password
            password = document.getElementById('password').value
            if(password.length <= 3){
                password_error.style.color = 'red'
                 password_error.textContent = 'Le  mot de passe est trop court !'
                 valide = false
            }
            else if(password.length > 3 && password.length < 5){
                password_error.style.color = 'green'
                password_error.textContent = 'Mot de passe  Acceptable !'
                setTimeout(function() {
                    password_error.style.display = 'none'  // Masquer l'élément
                },2000);
                valide = true
                
            }

})



     // desactivation de la soumission du formulaire
     form_inscription.addEventListener('submit', function(event) {
        event.preventDefault()
        if(valide === true){
            form_inscription.submit()
        }else{
            alert('Veuillez remplir les champs correctement avant de soumettre !')
        }
      })





   
    
}


inscription()