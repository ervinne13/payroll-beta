<div class="pull-right">
    @if($mode == "edit")
    <button id="action-update-close" type="button" class="action-button btn btn-success waves-effect">Update</button>
    @elseif($mode == "create")
    <button id="action-create-close" type="button" class="action-button btn btn-success waves-effect">Save</button>
    <button id="action-create-new" type="button" class="action-button btn bg-light-green waves-effect">Save & New</button>
    @endif

    <button id="action-close" type="button" class="action-button btn bg-grey waves-effect">Close</button>
</div>