<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    </head>
    <body>


        <div class="container">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input  id="first_name" type="text" class="validate">
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Last Name</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">verified_user</i>

                        <input id="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>


                    <div class="input-field col s6">
                        <i class="material-icons prefix">email</i>

                        <input id="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s2">
                        <div class="button">
                            <a class="waves-effect waves-light btn">Envoyer</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>


    </body>
</html>