<div class="row">
    <fieldset>
        <legend>Sayfa Gösterim Ayarları</legend>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[show_menu]", "Menü göster", $errors, [0=>'Hayır', 1=>'Evet'], isset($page->settings->show_menu) ? $page->settings->show_menu : 0) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[show_menu_location]", "Menü Gösterim Alanı", $errors, ['left'=>'Sol', 'right'=>'Sağ'], isset($page->settings->show_menu_location) ? $page->settings->show_menu_location : null) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[full_page]", "Tam Sayfa Göster", $errors, [0=>'Hayır', 1=>'Evet'], isset($page->settings->full_page) ? $page->settings->full_page : 0) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[show_content]", "Menüyle İçerik Göster", $errors, [0=>'Hayır', 1=>'Evet'], isset($page->settings->show_content) ? $page->settings->show_content : 0) !!}
        </div>
        <div class="col-md-3">
            <div class="form-group" style="margin-right: 10px;">
                <label>
                    {!! Form::checkbox("settings[has_content]", 1, old('settings.has_content', isset($page->settings->has_content) ? $page->settings->has_content : 0), ['class'=>'flat-blue']) !!}
                    &nbsp; İçerik Göster
                </label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" style="margin-right: 10px;">
                <label>
                    {!! Form::checkbox("settings[first_content]", 1, old('settings.first_content', isset($page->settings->first_content) ? $page->settings->first_content : 0), ['class'=>'flat-blue']) !!}
                    &nbsp; İlk İçerik Göster
                </label>
            </div>
        </div>
    </fieldset>
</div>

<div class="row">
    <fieldset>
        <legend>Sayfa Listeleme Ayarları</legend>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[list_page]", "Alt Sayfaları göster", $errors, [0=>'Hayır', 1=>'Evet'], isset($page->settings->list_page) ? $page->settings->list_page : 0) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[list_per_page]", "Sayfalama", $errors, array(''=>'Seçiniz') + array_combine(range(1, 20, 1), range(1, 20, 1)), isset($page->settings->list_per_page) ? $page->settings->list_per_page : 6) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[list_type]", "Liste Türü", $errors, ['grid'=>'Grid', 'list'=>'Liste'], isset($page->settings->list_type) ? $page->settings->list_type : 6) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[list_grid]", "Grid", $errors, array(''=>'Seçiniz') + array_combine(range(1, 12, 1), range(1, 12, 1)), isset($page->settings->list_grid) ? $page->settings->list_grid : 6) !!}
        </div>
    </fieldset>
</div>


<div class="row">
    <fieldset>
        <legend>İçerik Ayarları</legend>
        <div class="col-md-3">
            @if($newsCategories = app(\Modules\News\Repositories\CategoryRepository::class)->all()->pluck('name', 'slug')->toArray())
            {!! Form::normalSelect("settings[news_category]", "Haber Kategorisi", $errors, [null => 'Seçiniz']+$newsCategories, isset($page->settings->news_category) ? $page->settings->news_category : null) !!}
            @endif
        </div>
        <div class="col-md-3">
            @if($faqCategories = app(\Modules\Faq\Repositories\CategoryRepository::class)->all()->pluck('name', 'slug')->toArray())
                {!! Form::normalSelect("settings[faq_category]", "SSS Kategorisi", $errors, [null => 'Seçiniz']+$faqCategories, isset($page->settings->faq_category) ? $page->settings->faq_category : null) !!}
            @endif
        </div>
    </fieldset>
</div>
