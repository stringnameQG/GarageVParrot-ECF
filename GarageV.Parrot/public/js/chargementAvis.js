function avisStyle() { 
    let avis = document.querySelector(".avis__commentaire-btn");
    let avisDiv = "avis__commentaire-affichage";
    let avisDivNomPrenom = "avis__commentaire-affichage__nom-prenom";
    let avisP = "avis__commentaire-affichage__nom-prenom__item";
    let avisSpan = "avis__commentaire-affichage__commentaire";


        let divAvis = document.createElement("div");
        divAvis.className = avisDiv;
        avis.before(divAvis);

        let divNomPrenom = document.createElement("div");
        divNomPrenom.className = avisDivNomPrenom;
        divAvis.prepend(divNomPrenom);
        
        
        let pNomPrenom = document.createElement("p");
        pNomPrenom.textContent = "Prenom" + " " + "nom";
        pNomPrenom.className = avisP;
        divNomPrenom.append(pNomPrenom);
        

        let pNote = document.createElement("p");
        pNote.className = avisP;
        pNote.textContent = "5/5";
        divNomPrenom.append(pNote);
        
        let spanComment = document.createElement("span");
        spanComment.className = avisSpan;
        spanComment.innerText = "Bien essayé 4155555555555555sfdggggggggg555555555 sssssssssssssssssssss";
        divAvis.append(spanComment);
}

var infos = 0;
function chargementAvis(){
    const avis = document.querySelector("#PlusDeCommentaires");
    avis.addEventListener("click", function(e){
        infos += 3;
        console.log(infos);
    })
}



jQuery(document).ready(function($) {
    // Votre code ici avec les appels à la fonction $()
});
















/*
let adresse = function(mysql) {
    // informations pour se connecter à la base de données
    var pool = mysql.createPool({
        host     : 'localhost',
        user     : 'root',
        password : '',
        database : 'garagevparrot',
        charset  : 'UTF8_UNICODE_CI',
        multipleStatements: true
    });
    // à l'appel de cette fonction, ces informations sont retournées
    return pool;
}
*/
/*
// Création de l'objet xhr
const url = "http://127.0.0.1:8000/";
let requete = new XMLHttpRequest();
requete.open("GET", url, true);

requete.send();
requete.responseType = "json";
requete.onload = () => {
    if (requete.readyState == 4 && requete.status == 200) {
        const data = requete.response;
        console.log(data);
    } else {
        alert('Un problème est intervenu, merci de revenir plus tard.');
    }
};

var mysql = require('mysql');

var requeteSql = "SELECT name,first_name,comment,score FROM 'view' WHERE active='1';" ;
// sql.requete(mysql, sql, requeteSql);
*/