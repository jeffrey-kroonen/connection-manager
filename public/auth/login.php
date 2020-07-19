<?php

    require_once dirname(__DIR__, 2) . "/bootstrap.php";

    include HEADER;

?>

    <div class="container mt-5">
    
        <div class="row">
            <div class="col-sm-8 mx-auto">
            
                <h1 class="h3"><i class="fas fa-user-lock"></i> Login</h1>

                <div class="card-body shadow">
                
                    <form action="<?= URL; ?>/login" method="post" id="login-form">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>

                </div>
            
            </div>
        </div>

    </div>

<?php

    include FOOTER;

?>