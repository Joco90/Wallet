@csrf
<div class="row p-2">
    <div class="col-md-6">
        <label for="libelle" class="col-form-label">Description</label>
        <input type="text" class="form-control {{ $errors->has('libelle') ? ' is-invalid' : '' }}" id="libelle" name="libelle" value="{{$budget->libelle}}">
            @if ($errors->has('libelle'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('libelle') }}</strong>
                </span>
            @endif
    </div>
    <div class="col-md-6 row">
        <div class="col-sm-6">
            <label for="datebegin" class="col-form-label">Début</label>
            <input type="date" name="dateDeb" value="{{$budget->dateDeb}}" class="form-control {{ $errors->has('dateDeb') ? ' is-invalid' : '' }}" id="datebegin">
            @if ($errors->has('dateDeb'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('dateDeb') }}</strong>
            </span>
        @endif
        </div>
        <div class="col-sm-6">
            <label for="datebegin" class="col-form-label">Fin</label>
            <input type="date" name="dateFin" value="{{$budget->dateFin}}" class="form-control {{ $errors->has('dateFin') ? ' is-invalid' : '' }}" id="datebegin">
            @if ($errors->has('dateFin'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('dateFin') }}</strong>
            </span>
            @endif
        </div>
    </div>

</div>




