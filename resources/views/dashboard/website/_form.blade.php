<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Название:</strong>
            <input type="text" name="title" value="{{ $website->title ?? '' }}" class="form-control" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>URL-адрес:</strong>
            <input type="text" name="url" value="{{ $website->url ?? '' }}" class="form-control" />
        </div>
    </div>
</div>

@include('layouts._button')