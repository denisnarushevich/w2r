<h2><?php echo __('New reviews', null, 'admin') ?></h2>
<div class="cpanel">
    <?php
    $i = 0;
    if (count($reviews) < 1)
        echo __('There is no new contact.', null, 'admin');
    else
    {
        ?>
        <table>
            <thead>
                <tr>
                    <th><?php echo __('Client', null, 'admin') ?></th>
                    <th><?php echo __('Description', null, 'admin') ?></th>
                    <th><?php echo __('Action', null, 'admin') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews AS $c): ?>
                <tr>
                    <td><?php echo $c->getUser(); ?></td>
                    <td><?php echo $c->getDescription(); ?></td>
                    <td><a href="#" onclick="openZoombox('<?php echo url_for('@review_edit?id='.$c->getId()) ?>', 800, 600);">Edition</a></td>
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