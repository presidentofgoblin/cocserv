<?php defined('BASEPATH') OR exit('NO DIRECT SCRIPT ACCESS IS ALLOWED'); ?>
<div class="row padding-list">
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">
                    ADD SERVER
                </span>
                <?php echo validation_errors('<div class="red-text text-center">', '</div>') . '<br/ >';  ?>
                <form method="POST" action="<?php echo base_url('server/process'); ?>">
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="name" id="name" type="text">
                            <label for="name">Server Name <sup class="red-text">*</sup></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <p>Description <sup class="red-text">*</sup></p>
                            <textarea name="desc" id="desc"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 l6 input-field">
                            <input name="ip" id="ip" type="text">
                            <label for="ip">IP Address <sup class="red-text">*</sup></label>
                        </div>
                        <div class="col s12 m6 l6 input-field">
                            <input name="port" id="port" type="text">
                            <label for="port">Server Port <sup class="red-text">*</sup></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <select name="game" id="game">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="coc">Clash Of Clans</option>
                                <option value="bb">Boom Beach</option>
                                <option value="cr">Clash Royale</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 m3 l3">
                            <input type="submit" value="Submit" class="waves-effect waves-light btn">
                        </div>
                        <div class="col s6 m3 l3">
                            <input type="reset" value="Reset" class="waves-effect waves-light btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php echo $this->session->flashdata('msg'); ?>
    </div>
</div>
