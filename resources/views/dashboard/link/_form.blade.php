<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>URL-адрес:</strong>
            <input type="text" name="url" value="{{ $link->url ?? '' }}" class="form-control" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Фильтер:</strong>
            <input type="text" name="main_filter_selector" value="{{ $link->main_filter_selector ?? '' }}" class="form-control" />
        </div>
    </div>
</div>