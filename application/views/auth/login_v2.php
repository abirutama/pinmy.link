
    <section class="section">
        <div class="container box" style="max-width:480px">
            <h1 class="title">
                Sign In
            </h1>
            <hr>
            <?= $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url('auth') ?>">
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input name="email-login" class="input" type="email" placeholder="youremail@domain.com" value="<?= set_value('email-login'); ?>">
                    </div>
                    <?= form_error('email-login', '<p class="help is-danger">', '</p>'); ?>
                </div>
                
                <div class="field">
                    <label class="label">Password</label>
                    <div class="control">
                        <input name="pass-login" class="input" type="password" placeholder="">
                    </div>
                    <?= form_error('pass-login', '<p class="help is-danger">', '</p>'); ?>
                </div>
                <br>
                <div class="control">
                    <button class="button is-link is-fullwidth">Sign In</button>
                    <div class="g-signin2" data-onsuccess="onSignIn">Sign With Google</div>
                    <a href="#" class="g-signout2" onclick="signOut();">Signout</a>
                </div>

                <hr>
                <div>
                    <span>Don't have an account? <a href="<?= base_url('auth/register') ?>">Create a free account</a></span>
                </div>
            </form>
        </div>
    </section>
