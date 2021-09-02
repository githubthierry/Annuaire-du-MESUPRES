<div class="modal fade" id="open" tabindex="-1" role="dialog" aria-labelledby="openlabel" aria-hidden="true">
<div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header d-flex">
            <h2 class="modal-title" id="openlabel">Créer une poste</h2>
            <button type="button" class="close d-block" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{ route('postes.traitement') }}" method="POST">
                @csrf

                @include('Postes._form',['submitButtonText' => 'Ajouter'])

            </form>
        </div>
    </div>
</div>
</div>

