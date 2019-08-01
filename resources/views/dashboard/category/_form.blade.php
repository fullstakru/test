<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Название:</strong>
            <input type="text" name="title" value="{{ $category->title ?? '' }}" class="form-control" />
        </div>
    </div>
</div>

@include('layouts._button')