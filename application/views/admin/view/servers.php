<?php defined('BASEPATH') OR exit('NO DIRECT SCRIPT ACCESS IS ALLOWED'); ?>
<section class="content-header">
    <h1>Servers</h1>
</section>
<section class="content">
    <div class="box box-success">
        <div class="box-header">
            Server List
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Owner</th>
                    <th>Votes</th>
                    <th>Edit</th>
                </tr>
                {server}
                <tr>
                    <td>{id}</td>
                    <td>{name}</td>
                    <td>{ownername}</td>
                    <td>{votes}</td>
                    <td><a href="<?php echo base_url('admin/server/edit/'); ?>{id}">Edit</a></td>
                </tr>
                {/server}
            </table>
            <div class="box-footer">
                {pagination}
            </div>
        </div>
    </div>
</section>
