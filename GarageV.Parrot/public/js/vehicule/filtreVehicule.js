function carStyle(car) { 
    let avis = document.querySelector(".avis__commentaire-btn");
    let avisDiv = "avis__commentaire-affichage";
    let avisDivNomPrenom = "avis__commentaire-affichage__nom-prenom";
    let avisP = "avis__commentaire-affichage__nom-prenom__item";
    let avisSpan = "avis__commentaire-affichage__commentaire";

    car.forEach(element => {
        let divAvis = document.createElement("div");
        divAvis.className = avisDiv;
        avis.before(divAvis);

        let divNomPrenom = document.createElement("div");
        divNomPrenom.className = avisDivNomPrenom;
        divAvis.prepend(divNomPrenom);
        
        let pNomPrenom = document.createElement("p");
        pNomPrenom.textContent = element["first_name"] + " " + element["name"];
        pNomPrenom.className = avisP;
        divNomPrenom.append(pNomPrenom);
        
        let pNote = document.createElement("p");
        pNote.className = avisP;
        pNote.textContent = element["score"] + "/5";
        divNomPrenom.append(pNote);
        
        let spanComment = document.createElement("span");
        spanComment.className = avisSpan;
        spanComment.innerText = element["comment"];
        divAvis.append(spanComment);
    });
}


function AppelSciptPhp() {
    let form = {"limite" : 14};
    $.ajax({
        url: 'php/vehicule/avisAffichage.php',
        method: "POST",
        data: form,
        dataType: "json",
        timeout: 1000,
        success: function(data) {
            carStyle(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function BtnRechercher(){
    // const btnRechercher = document.querySelector("#Rechercher");
    btnRechercher.addEventListener("click", function(e){
        // AppelSciptPhp();
        let formulaire = $("form").serializeArray();
        console.log(formulaire);
    })
}

/*
$(document).ready(function(){
    $("button").click(function(){
        let chaine = $("form").serialize();
        let tb = $("form").serializeArray();
        
        console.log(chaine);
        console.log(tb);
    });
});
*/