<h1>
    View Task
</h1>
<div id="page-content" class="col-sm-9">
    <div class="view">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <tbody>

                    </tr>
                    <tr>
                        <td><strong><?php echo __('Task'); ?></strong></td>
                        <td>
                            <?php echo h($task['Task']['task']); ?>
                            &nbsp;


                    </tr>
                    <tr>
                        <td><strong><?php echo __('Description'); ?></strong></td>
                        <td>
                            <?php echo h($task['Task']['description']); ?>
                            &nbsp;
                            

                    </tr>


                </tbody>
            </table><!-- /.table table-striped table-bordered -->
        </div><!-- /.table-responsive -->
    </div>
</div>


