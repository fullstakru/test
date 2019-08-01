<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Название парсера:</strong>
            <input type="text" name="title" value="{{ $itemSchema->title ?? '' }}" class="form-control" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Фильтер парсера:</strong>
            <input type="text" name="css_expression" value="{{ $itemSchema->css_expression ?? '' }}" class="form-control" />
            <div class="help-block">Введите классы и селекторы для парсинга, разделяя столбцы || Например, title[h2.post_article_title]||excerpt[.post_article_description p]||image[img.post_article_image_img[src]]||source_link[a[href].info_more]</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Селектор секции контента:</strong>
            <input type="text" name="full_content_selector" value="{{ $itemSchema->full_content_selector ?? '' }}" class="form-control" />
        </div>
    </div>
</div>