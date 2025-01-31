<div class="card">
    <div class="card-header">
        <h2>Change Role</h2>
    </div>
    <div class="card-body">
        <form action="{{route("role.change")}}" id="website-control-form"  method="POST">
            @csrf
            <div class="mb-15 between-flex">
                <div>
                    <span style="font-size : 30px">Admin Role</span>
                </div>
                <div>
                    <label>
                        <input class="toggle-checkbox" type="checkbox" onchange="document.getElementById('website-control-form').submit();"  {{auth()->user()->role === "admin" ? 'checked' : '' }}/>
                        <div class="toggle-switch"></div>
                    </label>
                </div>
            </div>
        </form>
    </div>
</div>
