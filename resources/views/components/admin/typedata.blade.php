<div class="section-data-view mb-3">
    <a class="btn btn-primary mr-3" href="/admin/{{ $share['slugData'] }}">
        All <span class="font-weight-bold">{{ ' (' . $countData . ')' }}</span>
    </a>
    <a class="btn btn-danger mr-3" href="/admin/{{ $share['slugData'] }}/trashed">
        Trashed <span class="font-weight-bold">{{ ' (' . $countTrash . ')' }}</span>
    </a>

</div>

<div class="bulk-action d-flex align-items-center">
    <div class="form-group mr-3">
        <select class="form-control" name="bulk" id="bulk">
            <option value="">Bulk Action</option>
            <option value="{{ $action }}">Delete</option>
        </select>
    </div>
    <button id="button-bulk" class="btn btn-light mr-3"
        data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
        data-confirm-yes="bulkAction('{{ $share['model'] }}','{{ $share['slugData'] }}')" disabled>
        Apply
    </button>
</div>
