<div wire:ignore>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card mt-5 text-center ">
                <div class="card-header pb-0">
                    <h4 class="card-title text-muted">Users List</h4>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @foreach ($users as $user)
                        <a href="#" wire:click="CreateConversation('{{$user->email}}')" class="list-group-item list-group-item-action">{{$user->name}}</a>
                        @endforeach
                      </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
        <!-- /row -->

    </div>
</div>





