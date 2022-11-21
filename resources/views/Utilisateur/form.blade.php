@csrf
<div class="row">
    <div class="col-md-6 mb-3">
      <label for="name">Nom</label>
      <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{old('name')}}">

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif

    </div>
    <div class="col-md-6 mb-3">
      <label for="firstname">Prénoms</label>
      <input type="text" class="form-control {{ $errors->has('firstnames') ? ' is-invalid' : '' }}" name="firstnames" id="firstname" value="{{old('firstnames')}}">
      @if ($errors->has('firstnames'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('firstnames') }}</strong>
      </span>
      @endif
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="email">e-mail</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">@</span>
          </div>
          <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" value="{{old('email')}}">
          @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label for="telephone">N° Téléphone</label>
        <input type="text" class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}" id="telephone" name="telephone" value="{{old('email')}}">
        @if ($errors->has('telephone'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('telephone') }}</strong>
          </span>
        @endif
    </div>
</div>
@if ($activefile==0)
<div class="mb-3 form-group">
    <label for="photo">Photo de profile</label>
    <input type="file" class="form-control {{ $errors->has('photo') ? ' is-invalid' : '' }}" id="photo" name="photo">
    @if ($errors->has('photo'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('photo') }}</strong>
        </span>
    @endif
</div>
@endif

