<h2><?= esc($title) ?></h2>

<?php if (session()->get('validation')): ?>
    <?= \Config\Services::validation()->listErrors() ?>
<?php endif; ?>

<form action="<?= site_url('email/create') ?>" method="post">
    <?= csrf_field() ?>

    <label for="email">Email</label>
    <input type="input" name="email" value="<?= set_value('email') ?>">
    <br>

    <label for="subject">Subject</label>
    <input type="input" name="subject" value="<?= set_value('subject') ?>">
    <br>

    <label for="message">Message</label>
    <textarea name="message" cols="45" rows="4"><?= set_value('message') ?></textarea>
    <br>

    <input type="submit" name="submit" value="Create email item">
</form>
