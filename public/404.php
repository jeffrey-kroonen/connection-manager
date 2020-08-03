<?php

    header("HTTP/1.0 404 Not Found");

    include HEADER;

?>

    <div class="container mt-5">
        
        <div class="row">
            <div class="col-sm-8 mx-auto">
            
                <div class="text-center">
                    <h1 class="display-2">404</h1>

                    <p>
                        Sorry, we can't find that page.
                    </p>

                    <a href="<?= URL; ?>" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
                        <i class="fas fa-home fa-lg"></i>
                    </a>
                </div>

            </div>
        </div>

    </div>

<?php

    include FOOTER;

?>