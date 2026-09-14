{{-- @props(['route'=>$route,'title'=>$title]) --}}

<!-- Delete Modal -->
<div class="modal fade  " id="deleteConfirmModal{{ $key }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="acc_title">{{ __('app.delete_modal.title', ['entity' => $title]) }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('app.alerts.close') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('categories.delete')}}" method="post">
                @csrf
                @method("DELETE")
                <div class="modal-body">
                    <p id="acc_msg">{{ __('app.delete_modal.confirm') }}</p>
                    <input type="hidden" value="{{ $category->id }}" name="id" id="delete_id">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success si_accept_confirm">{{ __('app.common.yes') }}</button>
                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">{{ __('app.common.cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Delete Modal -->
