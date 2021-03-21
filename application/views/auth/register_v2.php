
    <section class="section">
        <div class="container box" style="max-width:480px">
            <h1 class="title">
                Sign Up
            </h1>
            <hr>
            <form method="post" action="<?= base_url('auth/register')?>">
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input name="email-regis" class="input" type="email" placeholder="youremail@domain.com" value="<?= set_value('email-regis'); ?>">
                    </div>
                    <?= form_error('email-regis', '<p class="help is-danger">', '</p>'); ?>
                </div>
                
                
                <div class="field">
                <label class="label">Password</label>
                    <div class="field is-grouped">

                        <p class="control is-expanded">
                            <input name="pass-regis" class="input" type="password" placeholder="Min 6 Characters">
                        </p>
                        <p class="control is-expanded">
                            <input name="repass-regis" class="input" type="password" placeholder="Repeat Password">
                        </p>
                    </div>
                <?= form_error('pass-regis', '<p class="help is-danger">', '</p>'); ?>
                </div>
                
                <div class="field">
                <label class="label">Pick an Address</label>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static">
                            pinmy.link/u/
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input name="username-regis" class="input" type="text" placeholder="username" value="<?= set_value('username-regis'); ?>">
                    </p>
                    </div>
                <?= form_error('username-regis', '<p class="help is-danger">', '</p>'); ?>
                </div>
                <div class="field">
                    <label class="label">Choose a Category</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="category-regis">
                                <?php foreach($category as $cat){ ?>
                                    <option value="<?= $cat['category_id']; ?>"><?= $cat['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="control">
                    <button class="button is-success is-fullwidth">Continue</button>
                </div>

                <hr>
                <div>
                    <span>Already have an account? <a href="<?= base_url('auth') ?>">Sign in</a></span>
                </div>
            </form>
        </div>
    </section>
