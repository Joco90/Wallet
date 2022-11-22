// Script d'ajout de revenu


// récuperation des valeurs du formulaire
let tous=[];
let data=[];
let addRevenu=document.getElementById('formRevenu');
let btnAjout=document.getElementById('revenuSubmit');
let user_id=document.getElementById('user_id');
let budget_id=document.getElementById('budget');
let date_revenu=document.getElementById('date_revenu');
let libelle_revenu=document.getElementById('description');
let montant_revenu=document.getElementById('montant');


btnAjout.addEventListener('click',verifForm);

function verifForm(event){
    event.preventDefault();
    var erreur=[];

    var alert=document.getElementById('alert');
    if(document.querySelector('.font-weight-bold')){
        alert.removeChild(document.querySelector('.font-weight-bold'));
    }

    if(budget_id.value ==''){
        erreur.push("Veuillez sélectionnez le budget");
        let erreurbudget="Veuillez sélectionnez le budget";
        budget_id.classList.add("is-invalid");
        let block=document.getElementById('blockBudget');
        let elementErreur=document.createElement('span');
        elementErreur.classList.add("invalid-feedback");
        block.appendChild(elementErreur);
        elementErreur.innerHTML+="<strong>"+erreurbudget+"</strong>";
    }

    if(date_revenu.value ==''){
        erreur.push("la date est obligatoire");
        let erreurdate="la date est obligatoire";
        date_revenu.classList.add("is-invalid");
        let block=document.getElementById('blockdate');
        let elementErreur=document.createElement('span');
        elementErreur.classList.add("invalid-feedback");
        block.appendChild(elementErreur);
        elementErreur.innerHTML="";
        elementErreur.innerHTML="<strong>"+erreurdate+"</strong>";
    }
    if(libelle_revenu.value ==''){
        erreur.push("la description est obligatoire");
        let erreurlibelle="la description est obligatoire";
        libelle_revenu.classList.add("is-invalid");
        let block=document.getElementById('blocklibelle');
        let elementErreur=document.createElement('span');
        elementErreur.classList.add("invalid-feedback");
        block.appendChild(elementErreur);
        elementErreur.innerHTML="<strong>"+erreurlibelle+"</strong>";
    }
    if(montant_revenu.value ==''){
        erreur.push("Le montant est obligatoire");
        let erreurmontant="Le montant est obligatoire";
        montant_revenu.classList.add("is-invalid");
        let block=document.getElementById('blockmontant');
        let elementErreur=document.createElement('span');
        elementErreur.classList.add("invalid-feedback");
        block.appendChild(elementErreur);

        elementErreur.innerHTML="<strong>"+erreurmontant+"</strong>";


    }

    if(erreur.length >1){

        const createChildDiv=document.createElement('div');
        createChildDiv.classList.add('font-weight-bold');
        document.getElementById('alert').classList.add('alert','alert-danger');
        document.querySelector('.alert').appendChild(createChildDiv);
        const createul=document.createElement('ul');
        createul.classList.add('mb-0');
        createChildDiv.appendChild(createul);
        // console.log(erreur);
       let listeerreur="Oups! Une erreur est survenue....";
            document.querySelector('.mb-0').innerHTML='<h5>'+listeerreur+'</h5>';

        return false;

    }

    delete(erreur);

//  console.log(data);
    storeServeur();
    storeLocal(user_id.value,budget_id.value,date_revenu.value,libelle_revenu.value,montant_revenu.value);

    budget_id.value="";
    date_revenu.value="";
    libelle_revenu.value="";
    montant_revenu.value="";

}


//les fonctions

//Stockage de revenu en local
function storeLocal(user_id,budget_id,date_revenu,libelle_revenu,montant_revenu){
    let tabRev= new Array();
    tabRev={
        user:user_id,
        budget:budget_id,
        date_revenu:date_revenu,
        libelle_revenu:libelle_revenu,
        montant_revenu:montant_revenu,
    };

    if (localStorage.getItem('revenu')!=null) {
        tous=JSON.parse(localStorage.getItem('revenu'))
        // console.log('il existe');
        // console.log(tous)
    }
    tous.push(tabRev);
    localStorage.setItem('revenu',JSON.stringify(tous));
    // console.log(tous);
}
///Les fonction d'enregistrement
function storeServeur(){
    let user_id=document.getElementById('user_id').value;
    let budget_id=document.getElementById('budget').value;
    let date_revenu=document.getElementById('date_revenu').value;
    let libelle_revenu=document.getElementById('description').value;
    let montant_revenu=document.getElementById('montant').value;

    $.ajax({
        url: "/ajoute-revenu",
        type: "POST",
        data:{
            user:user_id,
            budget:budget_id,
            date_revenu:date_revenu,
            libelle_revenu:libelle_revenu,
            montant_revenu:montant_revenu,
        "_token": $('#token').val(),
        },
        success:  function(response){
            var blockalert=document.querySelector('#alert');
            let listeerreur="Félicitation!";
            if(response.success){
                console.log(blockalert.classList.length);
                if(blockalert.classList.length===0){

                   blockalert.classList.add('alert','alert-success');
                   const createChildDiv=document.createElement('div');
                   createChildDiv.classList.add('font-weight-bold');
                   blockalert.appendChild(createChildDiv);
                   const createul=document.createElement('ul');
                   createul.classList.add('mb-0');
                   createChildDiv.appendChild(createul);
                   // console.log(erreur);
                    document.querySelector('.mb-0').innerHTML='<h5>'+listeerreur+'</h5>'+'<br>'+'<strong>'+response.success+'</strong>';
                }else{
                    blockalert.classList.remove('alert-danger');
                    blockalert.classList.add('alert-success');
                    blockalert.innerHTML='<h5>'+listeerreur+'</h5>'+'<br>'+'<strong>'+response.success+'</strong>';
                }
            }

        },
        error:function(response){
            console.log(response);
        }
        },

        );
        updateTableLeft(user_id);
}
//Fin de script d'ajout de revenu

function updateTableLeft(user_id){
    $.ajax({
        url:"/extrait-revenu",
        type: "GET",
        headers:{
            user:user_id,
        },
        success:  function(response){

            let createH4=document.createElement('h4');
            createH4.classList.add('d-flex','justify-content-between','align-items-center','mb-3');
            document.querySelector('.zonedroite').appendChild(createH4);
            // createH4.innerHTML=' <span class="text-primary">'+'Mon Portefeuille'+'</span>'
            console.log(response);
        },
        error : function (err) {
            console.log(err)
        }
    });
}
