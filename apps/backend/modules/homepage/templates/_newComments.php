<h2><?php echo __('New comments', null, 'admin') ?></h2>
<div class="cpanel">
    <?php
    $i = 0;
    if (count($comments) < 1)
        echo __('There is no new comment.', null, 'admin');
    else
    {
        ?>
        <table>
            <thead>
                <tr>
                    <th><?php echo __('Activity', null, 'admin') ?></th>
                    <th><?php echo __('Client', null, 'admin') ?></th>
                    <th><?php echo __('Comment', null, 'admin') ?></th>
                    <th><?php echo __('Action', null, 'admin') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comments AS $c): ?>
                <tr>
                    <td><?php echo $c->getActivity(); ?></td>
                    <td><?php echo $c->getUser(); ?></td>
                    <td><?php echo $c->getDescription(); ?></td>
                    <td><a href="#" onclick="openZoombox('<?php echo url_for('@comments_edit?id='.$c->getId()) ?>', 800, 600);">Edition</a></td>
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