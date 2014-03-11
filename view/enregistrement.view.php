<?php
/**
 * Vue enregistrement
 * 
 * @author: Guillaume CARAYON
 * @version: 1.0.1
 * 
 * @todo: Améliorer ergonomie formulaire
 * @todo: Améliorer affichage pour l'adresse
 */
?>


<script type="text/javascript">
    function afficher()
    {
        var formOrganisateur = document.getElementById("formEnrOrganisateur");
        var formParticipant = document.getElementById("formEnrParticipant");
        var formGlobal = document.getElementById("globForm");
        if (document.getElementById("chParticipant").checked === true)
        {
            formGlobal.style.display = "block";
            formOrganisateur.style.display = "none";
            formParticipant.style.display = "block";
        }
        else
        {
            formGlobal.style.display = "block";
            formOrganisateur.style.display = "block";
            formParticipant.style.display = "none";
        }
    }
</script>

<h2> Enregistrement </h2>

<?php echo $dataView["message"]; ?>

<a href="index.php?action=initialiser"> Revenir &agrave; l'accueil </a> <br/><br/>

<form method="POST" action="index.php?action=validerInscription" enctype="multipart/form-data">
    <fieldset>
        <legend> Mon type de compte </legend>
        <table>
            <tr>
                <td><label for="typeCompte">Souhaitez-vous vous inscrire en tant que : </label></td>
                <td><input type="radio" name="typeCompte" id="chParticipant" value="participant" onclick="afficher()" required/>
                    Participant </td>
                <td><input type="radio" name="typeCompte" value="organisateur" id="chOrganisateur" onclick="afficher()"/>
                    Organisateur</td>
            </tr>
        </table>
    </fieldset>
    <br/>
    
    <div id="globForm" style="display: none">
    <fieldset>
        <legend> Mes informations de connexion </legend>
        <table>
            <tr>
                <td><label for="login">Login :</label></td>
                <td><input type="text" size="25" name="login" id="login" placeholder="Pseudo" required/></td>
            </tr>
            <tr>
                <td><label for="password">Mot de passe :</label></td>
                <td><input type="password" size="25" name="password" id="password" placeholder="Mot de passe" oncopy='return false;' oncut='return false;' required/></td>
            </tr>
            <tr>
                <td><label for='confirmPassword'>Confirmez votre mot de passe :</label></td>
                <td><input type='password' size='25' name='confirmPassword' id='confirmPassword' onpaste='return false;' required /></td>
            </tr>
            <tr>
                <td><label for="adresseMail">E-mail :</label></td>
                <td><input type="email" size="50" name="adresseMail" id="adresseMail" placeholder="exemple@monsite.com" oncopy='return false;' onpaste='return false;' required /></td>
            </tr>
            <tr>
                <td><label for="confirmMail">Confirmez votre adresse mail :</label></td>
                <td><input type="email" size="50" name="confirmMail" required /></td>
            </tr>
        </table>
    </fieldset>
    
    <br/>
    
    <div id='formEnrOrganisateur' style='display: none'>
        <fieldset> 
            <legend> Informations sur mon organisation </legend>
            <h3> Renseignements g&eacute;n&eacute;raux sur mon organisation </h3>
            <table>
                <tr>
                    <td><label for="nomOrganisation">Nom de l'organisation :</label></td>
                    <td><input type="text" size="25" name="nomOrganisation" id="nomOrganisation" required/></td>
                </tr>
                <tr>
                    <td><label>Type d'organisation :</label></td>
                    <td><input type='radio' name='typeOrganisation' value='CS' required/> Club sportif
                        <input type='radio' name='typeOrganisation' value='CO'/> Club omnisport
                        <input type='radio' name='typeOrganisation' value='A'/> Autres </td>
                </tr>   
                <tr>
                    <td><label for='numTel'>Num&eacute;ro de t&eacute;l&eacute;phone :</label></td>
                    <td><input type='tel' size='10' name='numTel' required/></td>
                </tr> 
                <tr>
                    <td colspan='2'><label for='desc'>D&eacute;crivez-vous :</label></td>
                </tr>
                <tr>
                    <td colspan='2'><textarea rows='4' cols='50' name="desc">Faites une petite description de vous :)</textarea></td>
                </tr>
                <tr>
                    <td><label for="uploadAvatar">Photo de profil :</label></td>
                    <td><input type="hidden" name="MAX_FILE_SIZE" value="2097152"/>
                        <input type="file" name="uploadAvatar" /></td>
                </tr>
            </table>

            <h3> Renseignements g&eacute;n&eacute;raux sur le r&eacute;f&eacute;rent de mon organisation </h3>
            <table>
                <tr>
                    <td><label>Nom et pr&eacute;nom :</label></td>
                    <td><input type='text' size='25' placeholder="Pr&eacute;nom" name="nomRef" required/>
                        <input type='text' size='25' placeholder='Nom' name='prenomRef' required /></td>
                </tr>
                <tr>
                    <td><label for='mailRef'>Adresse mail :</label></td>
                    <td><input type='mail' size='50' name='mailRef' placeholder="Si possible diff&eacute;rente de celle de l'organisation" required/></td>
                </tr>
                <tr>
                    <td><label for='numTelRef'>Num&eacute;ro de t&eacute;l&eacute;phone :</label></td>
                    <td><input type='tel' size='10' name='numTelRef' required/></td>
                </tr>
            </table>
        </fieldset>
    </div>

    <div id="formEnrParticipant" style="display:none">
        <fieldset>
            <legend> Mes informations </legend>
            <table>
                <tr>
                    <td><label>Nom et pr&eacute;nom :</label></td>
                    <td><input type='text' size='25' placeholder="Pr&eacute;nom" name="nomParticipant"/>
                        <input type='text' size='25' placeholder='Nom' name='prenomParticipant'/></td></td>
                </tr>
                <tr>
                    <td><label for="genre"> Genre : </label></td>
                    <td><input type="radio" name="genre" value="M"/> Homme
                        <input type="radio" name="genre" value="F"/> Femme
                </tr>
                <tr>
                    <td><label for="dateNaissance"> Date de naissance : </label></td>
                    <td><input type="date" name="dateNaissance"/></td>
                </tr>
                <tr>
                    <td><label for='numTel'>Num&eacute;ro de t&eacute;l&eacute;phone :</label></td>
                    <td><input type='tel' size='10' name='numTel'/></td>
                </tr> 
                <tr>
                    <td colspan='2'><label for='desc'>D&eacute;crivez-vous :</label></td>
                </tr>
                <tr>
                    <td colspan='2'><textarea rows='4' cols='50' name='desc'>Vos sports pr&eacute;f&eacute;r&eacute;s ? Vos loisirs autres ? Votre philosophie de vie ?</textarea></td>
                </tr>
                <tr>
                    <td><label for="uploadAvatar">Photo de profil : </label></td>
                    <td><input type="file" name="uploadAvatar" /></td>
                </tr>
            </table>
        </fieldset>
    </div>
    <br/>
    <fieldset>
        <legend> Ma localisation </legend>
        <em> Les informations que vous saisissez ici nous permettent de localiser au mieux les &eacute;v&eacute;nements proches de vous<br/></em>
        <table>
            <tr>
                <td><input type="text" size="3" width="3" name="numVoie" placeholder="Num"/>
                    <input type="text" size="50" width="97" name="nomVoie" placeholder="Rue, Voie, Boulevard..."/></td>
            </tr>
            <tr>
                <td><input type="text" size="50" width="100" name="cptVoie" placeholder="B&acirc;timent, Appartement..."/></td>
            </tr>
            <tr>
                <td><input type="text" size="5" width="10" name="cpAdresse" placeholder="Code Postal"/>
                    <input type="text" size="50" width="90" name="villeAdresse" placeholder="Ville"/></td>
            </tr>
            <tr>
                <td><input type="text" size="50" name="dptAdresse" placeholder="D&eacute;partement"/>
                    <input type="text" size="50" name="regionAdresse" placeholder="R&eacute;gion"/></td>
            </tr>
            <tr>
                <td><input type="text" size="50" width="100" name="paysAdresse" placeholder="Pays"/></td>
            </tr>
        </table>
    </fieldset>
    <br/>
    <input type="submit" value="S'enregistrer"/>
</div>

</form>
