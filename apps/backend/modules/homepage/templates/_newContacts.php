<h2><?php echo __('New contacts', null, 'admin') ?></h2>
<div class="cpanel">
    <?php
    $i = 0;
    if (count($contacts) < 1)
        echo __('There is no new contact.', null, 'admin');
    else
    {
        ?>
        <table>
            <thead>
                <tr>
                    <th><?php echo __('Name', null, 'admin') ?></th>
                    <th><?php echo __('Surname', null, 'admin') ?></th>
                    <th><?php echo __('email', null, 'admin') ?></th>
                    <th><?php echo __('Comment', null, 'admin') ?></th>
                    <th><?php echo __('Action', null, 'admin') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts AS $c): ?>
                <tr>
                    <td><?php echo $c->getName(); ?></td>
                    <td><?php echo $c->getSurname(); ?></td>
                    <td><?php echo $c->getEmail(); ?></td>
                    <td><?php echo $c->getComment(); ?></td>
                    <td><a href="#" onclick="openZoombox('<?php echo url_for('@contact_edit?id='.$c->getId()) ?>', 800, 600);">Edition</a></td>
                </tr>
                <?php
                $i++;
                endforeach;
                if ($i % 2 != 0)
                    echo '<tr></tr>';
                ?>
            </tbody>
        </table>
        <?php
    }
    ?>
</div>