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
                    <th>Email</th>
                    <th>API Key</th>
                    <th>ACC. Type</th>
                    <th>Edit</th>
                </tr>
                {users}
                <tr>
                    <td>{id}</td>
                    <td>{username}</td>
                    <td>{email}</td>
                    <td>{apikey}</td>
                    <td>{acctype}</td>
                    <td><a href="<?php echo base_url('admin/edituser'); ?>{id}">Edit</a></td>
                </tr>
                {/users}
            </table>
            <div class="box-footer">
                {pagination}
            </div>
        </div>
    </div>
</section>
