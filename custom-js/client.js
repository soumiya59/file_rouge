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
    static Valide_email(P_){
        if (!/^\S+@\S+\.\S+$/.test(P_)) {
            throw new MyError("L'email est incorrecte!")
        }
        else {
            return P_
        }
    }
    static Valide_password(P_){
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

function novclient(frm_client) {
    let nom=frm_client.lastName.value;
    let prenom=frm_client.firstName.value;
    let email=frm_client.email.value;
    let password=frm_client.pswd.value;
    let result="";
    try {
        let obj_client=new Client(nom,prenom,email,password);
        client_list.push(obj_client)
        client_list.reverse()
    } catch (error) {
        result =elementError(error.message)
    }finally{
        document.getElementById("client").innerHTML = result;
        console.log(result)
        let empt = document.getElementById('client').innerHTML;
        if (empt == null || empt == ""){
            document.getElementById("myBtn").setAttribute('type', 'submit');
        }
    }
}
