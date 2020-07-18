<?php

    include HEADER;

    include NAV;

?>

    <div class="container mt-5">
    
        <h1 class="h3"><i class="fas fa-network-wired"></i> Create connection</h1>

        <div class="card-body shadow">

            <form action="<?= URL; ?>/connection/create" method="post">

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>
            
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" name="url" id="url" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            
            </form>

        </div>

    </div>

<?php

    include FOOTER;

?>