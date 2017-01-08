<?php defined('BASEPATH') OR exit('NO DIRECT SCRIPT ACCESS IS ALLOWED'); ?>

<div class="row padding-list">
    <div class="col s12 m12 l12">
        <div class="card grey-text text-darken-2">
            <div class="card-content">
                <span class="card-title">
                    Register
                </span>
                <?php echo validation_errors('<div class="red-text text-center">', '</div>') . '<br/ >';  ?>
                <form method="POST" action="<?php echo base_url('auth/register'); ?>">
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input name="username" id="username" type="text">
                            <label for="username">Username <sup class="red-text">*</sup></label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input name="email" id="email" type="email">
                            <label for="email">Email ID <sup class="red-text">*</sup></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input name="password" id="password" type="password">
                            <label for="password">Password <sup class="red-text">*</sup></label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input name="password_r" id="password_r" type="password">
                            <label for="password_r">Retype Password <sup class="red-text">*</sup></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 m3 l3">
                            <input type="reset" value="Reset" class="waves-effect waves-light btn">
                        </div>
                        <div class="col s6 m3 l3">
                            <input type="submit" value="Submit" class="waves-effect waves-light btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php echo $this->session->flashdata('msg') . '<br />'; ?>
    </div>
</div>
