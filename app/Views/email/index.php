<h2><?= esc($title) ?></h2>

<?php if ($email_list !== []): ?>

    <?php foreach ($email_list as $email_item): ?>

        <h3>Email: <?= esc($email_item['email']) ?></h3>
        <h3>Subject: <?= esc($email_item['subject']) ?></h3>
        <div class="main">
            Message: <?= esc($email_item['message']) ?>
        </div>

    <?php endforeach ?>

<?php else: ?>

    <h3>No Email</h3>

    <p>Unable to find any email for you.</p>

<?php endif ?>