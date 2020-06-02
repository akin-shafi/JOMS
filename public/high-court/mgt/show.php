<?php require_once('../../../private/initialize.php') ?>
<?php
require_login_hr();

$id = $_GET['id'] ?? redirect_to(url_for_hr('/dashboard.php')); // PHP > 7.0

$company_goal = CompanyGoal::find_by_id($id);
$company_goal_id = EmployeeObj::find_by_company_goal_id($company_goal->id);

if(is_post_request()){
    if($_POST['delete']){
        $args = $_POST['delete'];
        
        $company_goal = CompanyGoal::find_by_id($args['delete']);
        $company_goal->deleted = 1;
        $company_goal->merge_attributes($args);
        $result = $company_goal->save();
        
        if($result === true) {
        $session->message('Company Goal was Deleted.');
        redirect_to(url_for_hr('/company'));
        } else {
        // show errors
        }


    }
}

// echo '<pre>';
// print_r($company_goal_id);
// echo '</pre>';
?>
<?php $page_title = 'Court||Show' ?>
<?php include(SHARED_PATH . '/hr_header.php'); ?>


<section class='content container'>

    <div class='breadcrumb employee-section'>
        <a class="button smaller" href="<?php echo url_for_hr('/company') ?>">Company goals</a>
    </div>
    <div class='employee-section-header'>
        <div class='float-right'>
            <a href="<?php echo url_for_hr('/company/edit.php?id='.$id) ?>">
                <span title="edit company goal" class="fa-stack 3x">
                    <i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-pencil fa-inverse fa-stack-1x"></i>
                </span>
            </a>
            <a href="#">
                <span data-toggle="modal" data-target="#delete_company_goal_<?php echo $company_goal->id; ?>" title="" class="fa-stack action-danger">
                    <i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-trash fa-inverse fa-stack-1x"></i>
                </span>
            </a>
            <div class="modal fade delete-link" id="delete_company_goal_<?php echo $company_goal->id; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method='post'>
                        <div class="modal-header">
                        <h3 class="modal-title text-danger">Confirm delete</h3>
                        <button class="close" data-dismiss="modal" aria-label="Close"><span>x</span></button>
                        </div>
                        <div class="modal-body">
                        <p class="text-left">Are you sure you want to delete this company goal?</p>
                        <input type="hidden" name="delete[delete]" value="<?php echo $company_goal->id; ?>">
                        </div>
                        <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger modal-confirm">Yes, delete</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <h1><?php echo $company_goal->goals; ?></h1>
    </div>
    <div class='row'>
        <div class='col-md-6 offset-md-3'>
            <div class='info-group'>
                <div class='info-group-label'>Details</div>
                <table class='table'>
                    <tr>
                        <th>Target date:</th> <td><?php echo $company_goal->target_date; ?></td>
                    </tr>
                    <tr>
                        <th>Status:</th> <td><?php echo $company_goal->status ? CompanyGoal::STATUS[$company_goal->status] : '-'; ?></td>
                    </tr>
                    <tr>
                        <th>Details:</th> <td><p><?php echo $company_goal->details; ?></p></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <ul class='nav nav-tabs responsive mt-5'>
        <li class='nav-item'>
            <a class="nav-link" role="tab" data-toggle="tab" href="#objectives">Objectives
                <span class='badge badge-secondary'><?php echo count($company_goal_id); ?></span>
            </a>
        </li>
        <!-- <li class='nav-item'>
            <a class="nav-link" role="tab" data-toggle="tab" href="#projects">Company Projects
                <span class='badge badge-secondary'>0</span>
            </a>
        </li> -->
    </ul>

    <div class='tab-content responsive'>
        <div class='tab-pane active' id='objectives' role='tab-panel'>
            <h3>Objectives linked to this goal</h3>
            <!-- <form>
                <div class='filter-controls-multirow-wrap'>
                    <div class='filter-controls'>
                        <div class='form-group'>
                            <div class='form-check'>
                                <input name='showcompleted' type='checkbox' value='true'>
                                <label class='collection_radio_buttons' for='showcompleted'>Show completed objectives</label>
                            </div>
                        </div>
                        <div class='form-group buttons'>
                            <input class='btn btn-primary' type='submit' value='apply filter'>
                        </div>
                    </div>
                </div>
            </form> -->
            <table class='table data-table dt-responsive'>
                <thead>
                    <tr>
                        <th data-priority='1'>Employee</th>
                        <th class='sort-desc' data-priority='5'>Created Date</th>
                        <th data-priority='3'>Target Date</th>
                        <th data-priority='2'>Title</th>
                        <th data-priority='4'>% Complete</th>
                        <th data-priority='6'>State</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($company_goal_id as $value) { ?>
                    <tr>
                        <td><?php echo Employee::find_by_id($value->employee_id)->full_name() ?></td>
                        <td><?php echo $value->created_on ?></td>
                        <td><?php echo $value->due_date ?></td>
                        <td><?php echo $value->title ?></td>
                        <td><?php echo $value->progress ? EmployeeObj::PROGRESS[$value->progress].'%' : '-' ; ?></td>
                        <td><?php echo $value->state ? EmployeeObj::STATE[$value->state] : '-'; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- <div class='tab-pane' id='projects' role='tab-panel'>
            <p class='blankstate list-page-blankstate'>No projects linked to this goal</p>
        </div> -->

    </div>

</section>


<?php include(SHARED_PATH . '/admin_footer.php'); ?>