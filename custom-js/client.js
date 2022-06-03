const client_dom = document.getElementById("client");
const client_list=[]
class MyError extends Error { }

class Client {
   //Attributs génériques
    #nom;
    #prenom;
    #email;
    #password;
    //attribut de classe
    static nbr_Clients = 0
    //Méthodes de validation
    static Valide_Entree(P_entree) {
        if (!/^[A-Za-z]{3,9}$/i.test(P_entree)) {
            throw new MyError("Le nom doit avoir au moins trois caractéres!")
        } else {
            return P_entree
        }
    }
    static Valide_email(P_)
     {
        if (!/^\S+@\S+\.\S+$/.test(P_)) {
            throw new MyError("L'email est incorrecte!")
        }
        else {
            return P_
        }
    }
    static Valide_password(P_)
    {
       if (P_.length < 5) {
        throw new MyError("Votre mot de passe doit comporter au moins 5 caractères")
       }else {
           return P_
       }
   }
    //Constructeur classe mére
    constructor(P_n, P_p, email, password) {
        this.#nom = Client.Valide_Entree(P_n);
        this.#prenom = Client.Valide_Entree(P_p);
        this.#email = Client.Valide_email(email);
        this.#password = Client.Valide_password(password);
        this.constructor.nbr_Clients += 1
    }
    //Méthodes génériques (classe mére)
    Affichage() {
        return this.#nom + " | " + this.#prenom + " | " + this.#email+ " | " + this.#password
    }
    // Accesseur à l'attribut de classe
    GetNombreClients() {
        return this.constructor.nbr_Clients
    }

    Setnom(P_n) {
        this.#nom = Client.Valide_Entree(P_n)
    }
    Getnom() {
        return this.#nom
    }

    Setprenom(P_p) {
        this.#prenom = Client.Valide_Entree(P_p)
    }
    Getprenom() {
        return this.#prenom
    }

    Setemail(email) {
        this.#email = Client.Valide_email(email)
    }
    Getemail() {
        return this.#email
    }

    Setpassword(password) {
        this.#password = Client.Valide_password(password)
    }
    Getpassword() {
        return this.#password
    }
}

function elementError(msg){
    return '<p>' + msg + '</p>';
}
function afficherclient(list){
    let result=""
    for (let index = 0; index < list.length; index++) {
        const obj_client = list[index];
        result += "<hr><p> " + obj_client.Affichage() + "</p>" ;
    }
    return result;
}
function novclient(frm_client) {
    let nom=frm_client.txt_nom.value;
    let prenom=frm_client.txt_prenom.value;
    let email=frm_client.txt_email.value;
    let password=frm_client.txt_password.value;

    let result="";
    try {
        let obj_client=new Client(nom,prenom,email,password);
        client_list.push(obj_client)
        client_list.reverse()
        // result=afficherclient(client_list)
    } catch (error) {
        result =elementError(error.message)
    }finally{
        client_dom.innerHTML = result;;

        let empt = document.getElementById('client').innerHTML;
        if (empt == null || empt == ""){
            document.getElementById("myBtn").setAttribute('type', 'submit');
        }

    }
}
