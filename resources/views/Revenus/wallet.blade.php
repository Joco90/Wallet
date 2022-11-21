
<div class="col-md-6 col-lg-6 order-md-last">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-primary">{{$title}}</span>
        <span class="badge bg-primary rounded-pill">{{$revenus->count()}}</span>
    </h4>
    <ul class="list-group mb-3" id="rightPage">

        @foreach ($revenus as $revenu)

        <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
                <h6 class="my-0">{{$revenu->libelle}}</h6>
                <small class="text-muted">{{$revenu->budget->libelle}}</small>
            </div>
                <span class="text-muted">{{$revenu->montant}}</span>
        </li>
        @endforeach

        <li class="list-group-item d-flex justify-content-between">

        <span>Total (fCFA)</span>
        <strong>{{$revenus->count()}}</strong>
        </li>
    </ul>
</div>



