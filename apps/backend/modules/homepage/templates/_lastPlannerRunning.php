<h2><?php echo __('Last Planner Running', null, 'admin') ?></h2>
<div class="cpanel">
    <?php
    $i = 0;
    if (count($planners) < 1)
        echo __('There is no planner currently running.', null, 'admin');
    else
    {
        ?>
        <table>
            <thead>
                <tr>
                    <th><?php echo __('Client Name', null, 'admin') ?></th>
                    <th><?php echo __('Status', null, 'admin') ?></th>
                    <th><?php echo __('Number of activities', null, 'admin') ?></th>
                    <th><?php echo __('Start Date', null, 'admin') ?></th>
                    <th><?php echo __('End Date', null, 'admin') ?></th>
                    <th><?php echo __('Edit', null, 'admin') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($planners AS $planner): ?>
                <tr>
                    <td><?php echo $planner['name']; ?></td>
                    <td><?php echo $planner['status']; ?></td>
                    <td><?php echo $planner->Booking->count(); ?></td>
                    <td><?php echo $planner->getDateBegin(); ?></td>
                    <td><?php echo $planner->getDateEnd(); ?></td>
                    <td><a href="#" onclick="openZoombox('<?php echo url_for('@planner_admin_planner_edit?id='.$planner->getId()) ?>', 800, 600);">Edition</a></td>
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