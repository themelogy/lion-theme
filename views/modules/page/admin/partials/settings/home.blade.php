<div class="row">
    <fieldset>
        <legend>Anasayfa Başlık Ayarları</legend>
        <div class="col-md-12 form-inline">
            <div class="form-group" style="margin-right: 10px;">
                <label>
                    {!! Form::checkbox("settings[show_page_home]", 1, old('settings.show_page_home', isset($page->settings->show_page_home) ? $page->settings->show_page_home : 0), ['class'=>'flat-blue']) !!}
                    &nbsp; Anasayfa'da Göster
                </label>
            </div>
            <div class="form-group" style="margin-right: 10px;">
                <label>
                    {!! Form::checkbox("settings[show_services]", 1, old('settings.show_services', isset($page->settings->show_services) ? $page->settings->show_services : 0), ['class'=>'flat-blue']) !!}
                    &nbsp; Hizmetlerde Göster
                </label>
            </div>
        </div>

    </fieldset>
</div>
