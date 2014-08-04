<h2><?php echo __('Last Planner', null, 'admin') ?></h2>
<div class="cpanel">
    <?php
    $i = 0;
    if (count($planners) < 1)
        echo __('There is no new planner.', null, 'admin');
    else { ?>
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
  
        <?php /* if ($pager->haveToPaginate()): ?>
          <div class="pagination">
            <a href="<?php echo url_for('home') ?>?page=1">
              <img src="/images/first.png" alt="First page" title="First page" />
            </a>

            <a href="<?php echo url_for('home') ?>?page=<?php echo $pager->getPreviousPage() ?>">
              <img src="/images/previous.png" alt="Previous page" title="Previous page" />
            </a>

            <?php foreach ($pager->getLinks() as $page): ?>
              <?php if ($page == $pager->getPage()): ?>
                <?php echo $page ?>
              <?php else: ?>
                <a href="<?php echo url_for('home') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
              <?php endif; ?>
            <?php endforeach; ?>

            <a href="<?php echo url_for('home') ?>?page=<?php echo $pager->getNextPage() ?>">
              <img src="/images/next.png" alt="Next page" title="Next page" />
            </a>

            <a href="<?php echo url_for('home') ?>?page=<?php echo $pager->getLastPage() ?>">
              <img src="/images/last.png" alt="Last page" title="Last page" />
            </a>
          </div>
        <?php endif; ?>

        <div class="pagination_desc">
          <strong><?php echo count($pager) ?></strong> new planner on this page
          <?php if ($pager->haveToPaginate()): ?>
            - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
          <?php endif; ?>
        </div>
<?php */ } ?>
</div>
