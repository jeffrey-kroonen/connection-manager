<?php

    include HEADER;

    include NAV;

?>

    <div class="container mt-5">
    
        <h1 class="h3"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>

        <div class="card shadow border-0">
        
            <div class="card-header bg-primary">
                <div class="h5 m-0 text-light"><i class="fas fa-network-wired"></i> Connections</div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Active sessions</th>
                            <th>Last synchronised</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

                <a href="<?= URL; ?>/connection/create">Create new Connection</a>
            </div>
        
        </div>
    
    </div>

<?php

    include FOOTER;

?>