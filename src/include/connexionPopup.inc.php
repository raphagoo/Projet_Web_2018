        <!-- The Modal -->
        <div id="divConnexionPopup" class="modal">
            <!-- Modal Content -->
            <form class="modal-content animate" action="registration.php" method="post" id="form-signin">

                <div class="containerpopup">

                    <div id="buttons-container">
                        <button onclick="swapToSigninForm();" class="buttonSwapConnexionPopup-active">Inscription</button>
                        <button onclick="swapToLoginForm();" class="buttonSwapConnexionPopup-inactive">Connexion</button>
                    </div>
                    <div onclick="closePopup();" class="fermerpoup"><img src="Assets/CSS/Icons/croix.png"></div>
                    <div id="container-desc">
                        <h2>Bienvenue au comptoir des Arts !</h2>
                        <p>Découvrez et achetez en ligne de nombreuses pièces d'arts visuels</p>
                    </div>

                    <div id="container-body">

                        <label for="usernamePopupMail"><b>Nom d'utilisateur</b></label>
                        <input id="usernamePopupMail" type="text" name="connexionPopupUsername" required>

                        <br/>

                        <label for="email1"><b>Adresse e-mail</b></label>
                        <input id="email1" type="text" name="connexionPopupMail" required>

                        <br/>

                        <input type="submit" class="submitConnexionPopup" value="S'inscrire"/>
                    </div>

                </div>
            </form>

            <form class="modal-content animate" action="index.php" method="post" id="form-login">

                <div class="containerpopup">

                    <div id="buttons-container">
                        <button onclick="swapToSigninForm();" class="buttonSwapConnexionPopup-inactive">Inscription</button>
                        <button onclick="swapToLoginForm();" class="buttonSwapConnexionPopup-active">Connexion</button>
                    </div>
                    <div onclick="closePopup();" class="fermerpoup"><img src="Assets/CSS/Icons/croix.png"></div>
                    <div id="container-desc">
                        <h2>Bienvenue au comptoir des Arts !</h2>
                        <p>Découvrez et achetez en ligne de nombreuses pièces d'arts visuels</p>
                    </div>

                    <div id="container-body">
                        <label for="email"><b>Adresse e-mail ou nom d'utilisateur : </b></label>
                        <?php
                            if(!empty($_POST["emailUsername"]))
                            {
                                echo '<input id="email" type="text" name="emailUsername" value="' . $_POST["emailUsername"] . '" required>';
                                echo "<script type='application/javascript'>wrongEmailStyle();</script>";
                            } else {
                                echo '<input id="email" type="text" name="emailUsername" required>';
                            }
                        ?>

                        <br/>

                        <label for="psw"><b>Mot de passe : </b></label>
                        <input id="psw" type="password" name="password" required>
                        <?php if(!empty($_POST["emailUsername"])){echo "<script type='application/javascript'>wrongPasswordStyle();</script>";} ?>

                        <input type="submit" class="submitConnexionPopup" id="subConnection" name="subConnection" value="Se connecter"/>
                    </div>
                </div>
            </form>
        </div>