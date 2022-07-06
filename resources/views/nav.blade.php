@include('create')

<div class="col-md-12 pt-3" style="margin: 0 auto;display: flex;align-items: center; justify-content: space-evenly">
    <div >
        <i style="font-size: 2em " class="fas fa-user-plus addBtn"></i>
    </div>

    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="/users_list/users_list" class="btn btn-link list"  >Users List</a>
            <a href="/attendances" class="btn btn-link attend">Users attendances</a>
            <a href="/users_list/deleted" class="btn btn-link deleted">Deactivated</a>
        </nav>

    </div>
</div>

<hr/>
